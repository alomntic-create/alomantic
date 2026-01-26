<?php

namespace App\Filament\Resources\ProductUnitConversionResource\Pages;

use App\Filament\Resources\ProductUnitConversionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductUnitConversions extends ListRecords
{
    protected static string $resource = ProductUnitConversionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
