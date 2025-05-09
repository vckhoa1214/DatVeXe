<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;


class CheckAdminLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('admin_logged_in') && !Session::has('car_company_logged_in')) {
            return redirect()->route('dashboard.login');
        }

        return $next($request);
    }

}
