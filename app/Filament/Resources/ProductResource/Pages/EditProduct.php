<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;
    function getTitle(): string
    {
        return '  تعديل صنف';  // <-- هذا هو العنوان، عدّله كما تريد
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function afterCreate(): void
    {
        $this->saveMedia();
    }

    protected function afterSave(): void
    {
        $this->saveMedia();
    }

    private function saveMedia(): void
    {
        // حفظ الصور العادية كما هي
        if (!empty($this->data['media_files'])) {
            foreach ($this->normalizeToArray($this->data['media_files']) as $file) {
                Media::create([
                    'model_type' => 'Product',
                    'model_id'   => $this->record->id,
                    'url'        => $file,
                    'media_type' => 0, // الصور العادية
                ]);
            }
        }
         if (!empty($this->data['media_profile'])) {
            foreach ($this->normalizeToArray($this->data['media_profile']) as $file) {
                Media::create([
                    'model_type' => 'Product',
                    'model_id'   => $this->record->id,
                    'url'        => $file,
                    'media_type' => 10, // الصور البروفايل
                ]);
            }
        }

        // حفظ صور 360/180 بعد تصغيرها وضغطها
        if (!empty($this->data['media360'])) {
            foreach ($this->normalizeToArray($this->data['media360']) as $file) {
                try {
                    $optimizedPath = $this->optimizePanorama($file);
                    Media::create([
                        'model_type' => 'Product',
                        'model_id'   => $this->record->id,
                        'url'        => $optimizedPath,
                        'media_type' => 1,
                    ]);
                } catch (\Throwable $e) {
                    // إن فشل التحسين لأي سبب، نسجل الخطأ ونحتفظ بالأصل
                    Log::error("360 optimize failed for {$file}: " . $e->getMessage());
                    Media::create([
                        'model_type' => 'Product',
                        'model_id'   => $this->record->id,
                        'url'        => $file,
                        'media_type' => 1,
                    ]);
                }
            }
        }
    }


    private function optimizePanorama(string $relativePath): string
    {
        $disk = Storage::disk('public');

        if (!$disk->exists($relativePath)) {
            throw new \RuntimeException("File not found: {$relativePath}");
        }

        $fullPath = $disk->path($relativePath);

        // لصور ضخمة جداً
        @ini_set('memory_limit', '50M');

        // افتح الصورة
        $image = Image::make($fullPath);

        // صغّرها إذا كانت أكبر من 8000 بكسل عرض
        if ($image->width() > 8000) {
            $image->resize(8000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // احفظها بنفس المسار بجودة 75%
        $image->save($fullPath, 75);

        return $relativePath;
    }

    /**
     * يدعم أن يكون المدخل قيمة مفردة أو مصفوفة.
     */
    private function normalizeToArray($value): array
    {
        if ($value === null)   return [];
        if (is_array($value))  return $value;
        return [$value];
    }
}
