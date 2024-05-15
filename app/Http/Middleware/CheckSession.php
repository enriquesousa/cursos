<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::user())
        {
            return $next($request);
        }

        $data = User::findOrFail(Auth::user()->id);
        $elapseTime = Carbon::now()->diffInMinutes($data->last_interacted);
        $minLifetime = Config::get('session.lifetime');
        // dd($elapseTime, $minLifetime);

        if (Auth::user() && $elapseTime < $minLifetime)
        {
            return $next($request);
        }

        return redirect('/user/logout')->with('error',__('Session expired! Please login again.'));
            
    }


}
