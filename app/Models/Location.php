<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['location', 'phone', 'description', 'map_location'];

    public function media()
    {
        return $this->hasMany(Media::class, 'model_id')
            ->where('model_type', 'Location');
    }
}
