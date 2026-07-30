<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    protected $table = 'topic';
    protected $primaryKey = 'id_topic';
    public $timestamps = false;

    protected $fillable = [
        'name_topic',
        'description',
    ];

    public function subtopics(): HasMany
    {
        return $this->hasMany(Subtopic::class, 'id_topic', 'id_topic');
    }
}
