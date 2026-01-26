<?php

namespace App\Filament\Resources\ProductUnitConversionResource\Pages;

use App\Filament\Resources\ProductUnitConversionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductUnitConversion extends EditRecord
{
    protected static string $resource = ProductUnitConversionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
