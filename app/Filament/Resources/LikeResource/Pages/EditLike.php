<?php

namespace App\Filament\Resources\LikeResource\Pages;

use App\Filament\Resources\LikeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLike extends EditRecord
{
    function getTitle(): string
    {
        return '   تعديل صنف';  // <-- هذا هو العنوان، عدّله كما تريد
    }
    protected static string $resource = LikeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
