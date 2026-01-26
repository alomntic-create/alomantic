<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    function getTitle(): string
    {
        return '   تعديل  خدمة';  // <-- هذا هو العنوان، عدّله كما تريد
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
        if (!empty($this->data['media_files'])) {
            foreach ($this->data['media_files'] as $file) {
                Media::create([
                    'model_type' => 'Service',
                    'model_id'   => $this->record->id,
                    'url'        => $file,
                ]);
            }
        }
    }
}
