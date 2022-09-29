<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'password',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
