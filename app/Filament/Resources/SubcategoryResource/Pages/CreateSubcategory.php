<?php

namespace App\Filament\Resources\SubcategoryResource\Pages;

use App\Filament\Resources\SubcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubcategory extends CreateRecord
{
    protected static string $resource = SubcategoryResource::class;
    function getTitle(): string
    {
        return '  اضافة مجموعة فرعية';  // <-- هذا هو العنوان، عدّله كما تريد
    }
}
