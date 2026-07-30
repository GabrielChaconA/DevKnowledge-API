<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id_questions';
    public $timestamps = false;

    protected $fillable = [
        'question',
        'id_subtopic',
    ];

    public function subtopic(): BelongsTo
    {
        return $this->belongsTo(Subtopic::class, 'id_subtopic', 'id_subtopic');
    }

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class, 'id_questions', 'id_questions');
    }
}
