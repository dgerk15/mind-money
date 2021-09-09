<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;

    public const CHART_TYPES = ['pie', 'column'];

    protected $fillable = [
        'user_id',
        'chart_type',
        'use_rounding',
        'use_system_category',
        'currency',
    ];
}
