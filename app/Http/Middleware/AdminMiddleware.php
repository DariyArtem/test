<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ( Auth::check() && (Auth::user()->role->name === 'Admin' || Auth::user()->role->name === 'Creator' ) ) // Проверка, авторизован ли пользователь, и присвоена ли ему роль "Администратор
        {
            return $next($request); // Если проверка пройдена, продолжаем работу
        }
        // Если проверка не пройдена - редирект
        return redirect()->intended(route('private'))->withErrors(['role' => 'Permission Denied']);
    }
}
