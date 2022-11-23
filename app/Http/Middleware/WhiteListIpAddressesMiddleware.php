<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WhiteListIpAddressesMiddleware
{
    /**
     * @var string[]
     */
    public $whitelistIps = [
        '127.0.0.1',
        '143.176.87.6'
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!in_array($request->getClientIp(), $this->whitelistIps)) {
            abort(403, "You are restricted to access the site.");
        }

        return $next($request);
    }
}
