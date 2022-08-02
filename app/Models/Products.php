<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $table = 'products';

    public $fillable = [
        'name',
        'description'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];

    public static $rules = [
        'name' => 'nullable|string',
        'description' => 'nullable|string',
        'created_at' => 'required',
        'updated_at' => 'nullable'
    ];

    
}
