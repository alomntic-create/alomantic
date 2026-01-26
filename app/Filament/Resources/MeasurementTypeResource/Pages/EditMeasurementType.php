<?php

namespace App\Filament\Resources\MeasurementTypeResource\Pages;

use App\Filament\Resources\MeasurementTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMeasurementType extends EditRecord
{
    protected static string $resource = MeasurementTypeResource::class;

    function getTitle(): string
    {
        return '  تعديل طريقة قياس';  // <-- هذا هو العنوان، عدّله كما تريد
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
