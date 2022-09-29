<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['note_id', 'url'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
