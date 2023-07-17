<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        return $this->authorizeRoles($request, $next);
    }

    /**
     * Determine if the user is logged in and has the appropriate role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    protected function authorizeRoles($request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role == 1) {
                return $next($request);
            } elseif ($role == 2) {
                $allowedRoutes = ['checkout', 'cart', 'add_to_cart', 'PayStore', 'RazorPay', 'RazorPayStore', 'removecart', 'userdetails']; // Add the routes accessible to role=2

                if (in_array($request->route()->getName(), $allowedRoutes)) {
                    return $next($request);
                }

                return redirect('/')->with('error', 'Access denied.');
            } elseif ($role == 3) {
                $allowedRoutes = ['sellerdashboard', 'sellerproducts', 'sellerproductsAdd']; // Add the routes accessible to role=3

                if (in_array($request->route()->getName(), $allowedRoutes)) {
                    return $next($request);
                }

                return redirect('/')->with('error', 'Access denied.');
            }
        }

        return redirect()->route('login')->with('error', 'Please log in.');
    }
}
