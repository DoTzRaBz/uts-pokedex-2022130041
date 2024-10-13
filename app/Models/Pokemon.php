<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'primary_type',
        'weight',
        'height',
        'hp',
        'attack',
        'defense',
        'is_legendary',
        'photo',
    ];

    public function getPrimaryTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function setPrimaryTypeAttribute($value)
    {
        $this->attributes['primary_type'] = ucfirst($value);
    }
}
