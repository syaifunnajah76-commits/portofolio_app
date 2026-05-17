<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class karyas extends Model
{
    protected $table = 'karyas';
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
