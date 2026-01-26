<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;
    function getTitle(): string
    {
        return '  تعديل قسم';  // <-- هذا هو العنوان، عدّله كما تريد
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

    private function saveMedia()
    {
        if ($this->data['media_files'] ?? false) {
            foreach ($this->data['media_files'] as $file) {
                Media::create([
                    'model_type' => 'category',
                    'model_id'   => $this->record->id,
                    'url'        => $file,
                ]);
            }
        }
    }
}
