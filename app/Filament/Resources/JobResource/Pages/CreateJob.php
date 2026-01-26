<?php

namespace App\Filament\Resources\JobResource\Pages;

use App\Filament\Resources\JobResource;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJob extends CreateRecord
{
    protected static string $resource = JobResource::class;

    function getTitle(): string
    {
        return '   اضافة اعمال';  // <-- هذا هو العنوان، عدّله كما تريد
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
                    'model_type' => 'Job',
                    'model_id'   => $this->record->id,
                    'url'        => $file,
                ]);
            }
        }
    }

}
