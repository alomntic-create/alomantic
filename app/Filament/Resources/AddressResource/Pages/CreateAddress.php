<?php

namespace App\Filament\Resources\AddressResource\Pages;

use App\Filament\Resources\AddressResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAddress extends CreateRecord
{
    function getTitle(): string
    {
        return '     اضافة عنوان';  // <-- هذا هو العنوان، عدّله كما تريد
    }
    protected static string $resource = AddressResource::class;
}
