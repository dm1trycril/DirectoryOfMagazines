<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $table = 'magazines';

    protected $fillable = ['name', 'description', 'img_src', 'authors_list', 'release_date'];

    protected $casts = [
        'authors_list' => 'array',
    ];

    use HasFactory;
}
