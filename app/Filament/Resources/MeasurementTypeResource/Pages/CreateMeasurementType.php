<?php

namespace App\Filament\Resources\MeasurementTypeResource\Pages;

use App\Filament\Resources\MeasurementTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMeasurementType extends CreateRecord
{
    protected static string $resource = MeasurementTypeResource::class;

    function getTitle(): string
    {
        return '  انشاء طريقة قياس ';  // <-- هذا هو العنوان، عدّله كما تريد
    }
}
