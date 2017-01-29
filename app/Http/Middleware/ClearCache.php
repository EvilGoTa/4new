<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 18.12.2016
 * Time: 13:29
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Artisan;

class ClearCache
{
    public function handle($request, Closure $next)
    {
        Artisan::call('view:clear');
        return $next($request);
    }
}