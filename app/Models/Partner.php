<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable =['name'];


    public function media()
    {
        return $this->hasMany(Media::class, 'model_id')
            ->where('model_type', 'Partner');
    }
}
