<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info'; // لأن الاسم مفرد وليس Infos
    protected $fillable = [
        'type',
        'title',
        'subtitle',
        'content',
    ];
    public function media()
    {
        return $this->hasMany(Media::class, 'model_id')
            ->where('model_type', 'Info');
    }
}
