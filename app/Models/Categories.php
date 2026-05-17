<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use app\models\karyas;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name_category',
    ];

    public function karyas():HasMany
    {
        return $this->hasMany(karyas::class);
    }
}
