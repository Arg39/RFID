<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassUser extends Model
{
    use HasFactory;

    protected $table = 'class_user';

    protected $fillable = [
        'user_id',
        'class_id',
        'start_date',
        'end_date',
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to Class
    public function class()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}