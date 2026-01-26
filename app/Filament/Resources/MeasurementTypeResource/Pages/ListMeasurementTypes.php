<?php

namespace App\Filament\Resources\MeasurementTypeResource\Pages;

use App\Filament\Resources\MeasurementTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMeasurementTypes extends ListRecords
{
    protected static string $resource = MeasurementTypeResource::class;

    function getTitle(): string
    {
        return '   طرق القياس';  // <-- هذا هو العنوان، عدّله كما تريد
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
