<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Magazine extends Model
{
    protected $table = 'magazines';

    protected $fillable = ['name', 'description', 'img_src', 'release_date'];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(
            Author::class,
            'magazines_to_authors',
            'magazine_id',
            'author_id'
        );
    }

    use HasFactory;
}
