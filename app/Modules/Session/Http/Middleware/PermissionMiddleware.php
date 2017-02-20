<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:11
 */
namespace App\Modules\Session\Http\Middleware;

use Auth;
use Closure;
use Redirect;
use Request;

class PermissionMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(!Auth::check()) {
            return Redirect::intended ( '/session/login');
        }
        return $next($request);
    }
}
