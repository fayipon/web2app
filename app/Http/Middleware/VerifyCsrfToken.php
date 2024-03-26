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
        '/app-post',
        '/web-api/auth/session/v2/verifySession',
        '/game-api/gem-saviour-conquest/v2/GameInfo/Get',
        '/web-api/game-proxy/v2/GameName/Get',
    ];
}
