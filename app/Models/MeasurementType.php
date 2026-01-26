<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementType extends Model
{
    protected $fillable = ['name', 'abbreviation'];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
