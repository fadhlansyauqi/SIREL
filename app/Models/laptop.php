<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class laptop extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'laptop_code', 'title', 'cover', 'slug'
    ];

    function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
            ];    
    }
}
