<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'author/list',
        'author/add',
        'author/update',
        'author/delete',

        'magazine/list',
        'magazine/add',
        'magazine/update',
        'magazine/delete',
    ];
}
