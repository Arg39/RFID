<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;

    protected $table = 'absences';

    protected $fillable = [
        'user_id',
        'date',
        'status',
        'check_in',
        'check_out',
    ];

    /**
     * Get the user that owns the absence.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}