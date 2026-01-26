<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   protected $fillable=['title','content','detail'];

    public function media()
    {
        return $this->hasMany(Media::class, 'model_id')
            ->where('model_type', 'Service');
    }
}
