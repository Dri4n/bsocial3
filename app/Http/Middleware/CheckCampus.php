<?php

namespace App\Http\Middleware;

use Closure;
use App\Campus;

class CheckCampus
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
        $host = $request->getHost();
        $campus = Campus::where('host',$host)->first();
        if($campus !== NULL){
            session()->flash('campus_info',$campus);
            session()->flash('campus_id',$campus->id);
        }
        return $next($request);
    }
}
