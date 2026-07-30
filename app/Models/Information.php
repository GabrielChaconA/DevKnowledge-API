<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Information extends Model
{
    protected $table = 'information';
    protected $primaryKey = 'id_infomation'; // typo exists in DB
    public $timestamps = false;

    protected $fillable = [
        'title_info',
        'content_info',
        'type_info',
        'id_subtopic',
    ];

    public function subtopic(): BelongsTo
    {
        return $this->belongsTo(Subtopic::class, 'id_subtopic', 'id_subtopic');
    }
}
