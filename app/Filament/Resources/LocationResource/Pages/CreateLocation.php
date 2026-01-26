<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLocation extends CreateRecord
{
    protected static string $resource = LocationResource::class;

    function getTitle(): string
    {
        return '   اضافة فرع';
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
        if (!empty($this->data['media_files'])) {

            foreach ($this->data['media_files'] as $file) {
                Media::create([
                    'model_type' => 'Location',
                    'model_id'   => $this->record->id,
                    'url'        => $file,
                ]);
            }

        }

    }
}
