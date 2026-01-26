<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['model_type', 'media_type','model_id', 'url', 'type', 'order'];

    public function model()
    {
        return $this->morphTo();
    }
}
