<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'title',
        'is_completed',
    ];

    // Optional: cast is_completed to boolean
    protected $casts = [
        'is_completed' => 'boolean',
    ];
}
