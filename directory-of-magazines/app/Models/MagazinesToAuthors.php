<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagazinesToAuthors extends Model
{
    protected $table = 'magazines_to_authors';

    protected $fillable = ['author_id', 'magazine_id'];

    use HasFactory;
}
