<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLocation extends EditRecord
{
    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    function getTitle(): string
    {
        return '   تعديل فرع';
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
                    'model_type' => 'Location',
                    'model_id'   => $this->record->id,
                    'url'        => $file,
                ]);
            }
        }
    }

    }
