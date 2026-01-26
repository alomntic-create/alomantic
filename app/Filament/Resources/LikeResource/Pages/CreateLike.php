<?php

namespace App\Filament\Resources\LikeResource\Pages;

use App\Filament\Resources\LikeResource;
use App\Models\Like;
use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;

class CreateLike extends CreateRecord
{
    protected static string $resource = LikeResource::class;

    function getTitle(): string
    {
        return '   اضافة اصناف';  // <-- هذا هو العنوان، عدّله كما تريد
    }
    protected function handleRecordCreation(array $data): Model
    {
        // نفرغ product_ids من الفورم
        $productIds = $data['product_ids'];

        foreach ($productIds as $productId) {
            Like::create(['product_id' => $productId]);
        }

        // ممكن نرجع أي لايك (أول واحد مثلا) عشان Filament ما ينهار
        return Like::whereIn('product_id', $productIds)->first();
    }

}
