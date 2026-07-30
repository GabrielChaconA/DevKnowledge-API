<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{
    protected $table = 'question_options';
    protected $primaryKey = 'id_question_option';
    public $timestamps = false;

    protected $fillable = [
        'texto_options',
        'is_correct',
        'id_questions',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'id_questions', 'id_questions');
    }
}
