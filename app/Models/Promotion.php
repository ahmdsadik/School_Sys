<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'from_grade_id',
        'from_classroom_id',
        'from_section_id',
        'to_grade_id',
        'to_classroom_id',
        'to_section_id',
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function fromGrade() : BelongsTo
    {
        return $this->belongsTo(Grade::class, 'from_grade_id');
    }

    public function fromClassroom() : BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'from_classroom_id');
    }

    public function fromSection() : BelongsTo
    {
        return $this->belongsTo(Section::class, 'from_section_id');
    }

    public function toGrade() : BelongsTo
    {
        return $this->belongsTo(Grade::class, 'to_grade_id');
    }

    public function toClassroom() : BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'to_classroom_id');
    }

    public function toSection() : BelongsTo
    {
        return $this->belongsTo(Section::class, 'to_section_id');
    }


}
