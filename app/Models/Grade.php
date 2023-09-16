<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'notes'];
    public array $translatable = ['name'];

    public function classrooms():hasMany
    {
        return $this->hasMany(Classroom::class);
    }

    // Check if the grade has any classrooms
    public function hasClassrooms():bool
    {
        return $this->classrooms()->count() > 0;
    }

    // Grade has many sections
    public function sections():hasMany
    {
        return $this->hasMany(Section::class);
    }
}
