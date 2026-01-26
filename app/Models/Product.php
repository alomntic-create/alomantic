<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sku', 'name', 'slug', 'description', 'price_type', 'base_unit_id', 'stock_quantity', 'is_active', 'extra_json','category_id','detail'];


    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function productUnits()
    {
        return $this->hasMany(ProductUnit::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'model_id')
            ->where('model_type', 'Product');
    }



    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
