<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RgbObject extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows convention)
    protected $table = 'rgb_objects';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'red', 
        'green', 
        'blue', 
        'object_color', 
        'object_material', 
        'object_thickness', 
        'object_specific_data'
    ];

    // Optionally, you can specify hidden fields or dates for casting
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
