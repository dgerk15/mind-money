<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

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
        'cost',
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

    public function getRecordDate()
    {
        return Date::parse($this->created_at)->format('j F Y');
    }
}
