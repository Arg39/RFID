<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scans extends Model
{
    use HasFactory;
    protected $table = 'scans';
    protected $fillable = ['uid', 'nama', 'nisn','status'];
}
