<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Media;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    // يمكنك تعديل القيم حسب حاجتك
    private int $panoramaMaxWidth = 4096;   // أقصى عرض لصورة 360
    private int $panoramaQuality  = 75;     // جودة JPEG/WebP بعد الضغط

    function getTitle(): string
    {
        return '   اضافة صنف';
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
                    'media_type' => 10,
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

    /**
     * يقلص عرض صورة 360 ويضغطها مع الحفاظ على الامتداد نفسه.
     * يعيد نفس المسار (relative path) بعد الكتابة فوق الملف.
     */
    private function optimizePanorama(string $relativePath): string
    {
        $disk = Storage::disk('public');

        if (!$disk->exists($relativePath)) {
            throw new \RuntimeException("File not found: {$relativePath}");
        }

        $fullPath = $disk->path($relativePath);

        // لصور ضخمة جداً
        @ini_set('memory_limit', '1024M');

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
        $image->save($fullPath, 80);

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
