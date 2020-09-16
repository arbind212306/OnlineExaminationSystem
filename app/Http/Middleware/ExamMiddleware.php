<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $record = DB::table('user_exam_enroll')
                    ->where(['user_id' => Auth::user()->id, 'exam_id' => \Request::segment(3), 'status' => 1])
                    ->first();

        if(Auth::user()->is_active && $record != null)
        {
            return $next($request);
        }
        else
        {
            return redirect('/home')->with(['error' => 'You are not allowed to access this assesment test. Contact Admin to allow for the assesment test.']);
        }
        
    }
}
