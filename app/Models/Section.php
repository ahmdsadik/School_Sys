<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;


class Section extends Model
{
    use HasFactory, hasTranslations;

    protected $fillable = [
        'name',
        'status',
        'grade_id',
        'classroom_id',
    ];

    public array $translatable = ['name'];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => match ($value) {
                '1' => __('section_list.status_active'),
                '0' => __('section_list.status_inactive'),
                default => 'Unknown',
            },
        );
    }

    public function getStatusVal()
    {
        return $this->status == __('section_list.status_active') ? '1' : '0';
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }
}
