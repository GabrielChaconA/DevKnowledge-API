<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flashcard extends Model
{
    protected $table = 'flashcards';
    protected $primaryKey = 'id_flashcards';
    public $timestamps = false;

    protected $fillable = [
        'front',
        'back',
        'id_subtopic',
    ];

    public function subtopic(): BelongsTo
    {
        return $this->belongsTo(Subtopic::class, 'id_subtopic', 'id_subtopic');
    }
}
