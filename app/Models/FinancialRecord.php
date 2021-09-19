<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'alias',
        'description',
        'user_id',
        'category_id',
        'type',
    ];

    public function sluggable(): array
    {
        return [
            'alias' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
