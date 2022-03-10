<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = ['name', 'surname', 'middle_name'];

    public function magazines(): BelongsToMany
    {
        return $this->belongsToMany(
            Magazine::class,
            'magazines_to_authors',
            'author_id',
            'magazine_id'
        );
    }

    use HasFactory;
}
