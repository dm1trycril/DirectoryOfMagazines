<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = ['name', 'surname', 'middle_name'];

    public function magazines(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
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
