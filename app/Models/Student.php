<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import this for factory support
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory; // Enables factory usage

    protected $table = 'students';

    protected $fillable = ['name', 'age', 'gender', 'address'];

    // If your table doesn't use 'created_at' and 'updated_at', disable timestamps
    public $timestamps = true; // Set to 'false' if you don't want timestamps

    // Optionally, you can define casts (for automatic data conversion)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
