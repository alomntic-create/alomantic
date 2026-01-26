<?php

namespace App\Filament\Resources\PartnerResource\Pages;

use App\Filament\Resources\PartnerResource;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartner extends EditRecord
{
    protected static string $resource = PartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    function getTitle(): string
    {
        return '  تعديل بيانات شريك';  // <-- هذا هو العنوان، عدّله كما تريد
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
                    'model_type' => 'Partner',
                    'model_id'   => $this->record->id,
                    'url'        => $file,
                ]);
            }
        }
    }
}
