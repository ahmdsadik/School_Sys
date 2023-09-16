<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religion extends Model
{
    use  HasTranslations;

    public array $translatable = ['name'];
    protected $fillable = [
        'name',
    ];
}