<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class StudentParent extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'email',
        'password',
        'father_name',
        'father_national_id_number',
        'father_passport_number',
        'father_phone',
        'father_job',
        'father_nationality_id',
        'father_blood_type_id',
        'father_religion_id',
        'father_address',

        'mother_name',
        'mother_national_id_number',
        'mother_passport_number',
        'mother_phone',
        'mother_job',
        'mother_nationality_id',
        'mother_blood_type_id',
        'mother_religion_id',
        'mother_address',
    ];

    public array $translatable = [
        'father_name',
        'father_job',
        'mother_name',
        'mother_job',
    ];

    // protected $table = 'student_parents';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_parents';


    public function fatherReligion(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'father_religion_id');
    }

    public function fatherBloodType(): BelongsTo
    {
        return $this->belongsTo(Blood_type::class, 'father_blood_type_id');
    }

    public function fatherNationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class, 'father_nationality_id');
    }

    public function motherReligion(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'mother_religion_id');
    }

    public function motherBloodType(): BelongsTo
    {
        return $this->belongsTo(Blood_type::class, 'mother_blood_type_id');
    }

    public function motherNationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class, 'mother_nationality_id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'parent_id');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
