<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Todo extends Model
{
    protected $fillable = [
        'task',
        'user_id',
        'is_completed'
    ];

    // RELASI: satu todo milik satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}