<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['customer', 'location', 'customer_id', 'description'];

    public function media()
    {
        return $this->hasMany(Media::class, 'model_id')
            ->where('model_type', 'Job');
    }
}
