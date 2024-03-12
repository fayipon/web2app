<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [

        // '/api/register', 
        // '/api/login', 
        // '/api/recharge', 
        // '/api/withdraw', 
        // '/api/order', 
        // '/api/balance', 
        // '/api/record',
         '/agentapi/v1/login', 
         '/agentapi/v1/recharge', 
         '/agentapi/v1/withdraw', 
         '/agentapi/v1/balance', 
         '/agentapi/v1/record',

    ];
}
