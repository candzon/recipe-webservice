<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // Specify the table name if different from the pluralized form of the model name
    protected $table = 'recipes';

    // Define fillable fields
    protected $fillable = [
        'name',
        'image',
        'duration',
        'servings',
        'ingredients',
        'instructions'
    ];

    // Cast ingredients and instructions as arrays
    protected $casts = [
        'ingredients' => 'array',
        'instructions' => 'array'
    ];
}
