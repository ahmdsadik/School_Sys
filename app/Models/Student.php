<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory, HasTranslations;

    protected $casts = [
        'date_birth' => 'date:Y-m-d',
        'academic_yeah' => 'year:Y',
    ];

    public array $translatable = ['name'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender_id',
        'blood_type_id',
        'nationality_id',
        'grade_id',
        'classroom_id',
        'section_id',
        'student_parent_id',
        'date_birth',
        'academic_year',
    ];

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function bloodType(): BelongsTo
    {
        return $this->belongsTo(Blood_type::class);
    }

    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class);
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(StudentParent::class, 'student_parent_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function attendance(): hasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
