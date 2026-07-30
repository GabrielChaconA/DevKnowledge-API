<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subtopic extends Model
{
    protected $table = 'subtopic';
    protected $primaryKey = 'id_subtopic';
    public $timestamps = false;

    protected $fillable = [
        'name_subtopic',
        'level_subtopic',
        'id_topic',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'id_topic', 'id_topic');
    }

    public function information(): HasMany
    {
        return $this->hasMany(Information::class, 'id_subtopic', 'id_subtopic');
    }

    public function flashcards(): HasMany
    {
        return $this->hasMany(Flashcard::class, 'id_subtopic', 'id_subtopic');
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class, 'id_subtopic', 'id_subtopic');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'id_subtopic', 'id_subtopic');
    }
}
