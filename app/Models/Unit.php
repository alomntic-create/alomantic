<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name', 'abbreviation', 'is_base', 'is_measurable', 'measurement_type_id'];

    public function measurementType()
    {
        return $this->belongsTo(MeasurementType::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_unit_conversions')->withPivot('multiplier')->withTimestamps();
    }

    public function productUnitConversions()
    {
        return $this->hasMany(ProductUnitConversion::class);
    }


}
