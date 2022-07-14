<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiveMiddleware
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
//        dd(Auth::check() && Auth::user()->isActive());
//        if ( Auth::check() && Auth::user()->isActive() ) // Проверка, активен ли пользователь
//        {
//              return $next($request); // Если проверка пройдена, продолжаем работу
//        }
//        // Если проверка не пройдена - редирект
//        return redirect('login')->withErrors(['status' => 'You have been blocked by administrator']);
//


    }

    protected function isActive(Request $request){

        return false;
    }
}
