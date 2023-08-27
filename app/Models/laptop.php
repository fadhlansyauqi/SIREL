<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class laptop extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

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

    /**
     * The categories that belong to the laptop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'laptop_category', 'laptop_id', 'category_id');
    }
}
