<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExerciseOption extends Model
{
    protected $table = 'excercise_options'; // table name typo preserved from DB
    protected $primaryKey = 'id_exercise_options';
    public $timestamps = false;

    protected $fillable = [
        'text_excercise',
        'is_correct',
        'id_exercise',
    ];

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class, 'id_exercise', 'id_exercise');
    }
}
