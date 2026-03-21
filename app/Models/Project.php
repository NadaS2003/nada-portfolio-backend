<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'github_url',
        'demo_url',
        'technologies',
    ];
    protected function casts(): array
    {
        return [
            'technologies' => 'array',
        ];
    }
}
