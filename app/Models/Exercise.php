<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exercise extends Model
{
    protected $table = 'excercise'; // table name typo preserved from DB
    protected $primaryKey = 'id_exercise';
    public $timestamps = false;

    protected $fillable = [
        'tittle_excersice',
        'content_excercise',
        'type',
        'id_subtopic',
    ];

    public function subtopic(): BelongsTo
    {
        return $this->belongsTo(Subtopic::class, 'id_subtopic', 'id_subtopic');
    }

    public function options(): HasMany
    {
        return $this->hasMany(ExerciseOption::class, 'id_exercise', 'id_exercise');
    }
}
