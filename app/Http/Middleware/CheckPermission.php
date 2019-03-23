<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
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
//        no user
        if ($request->user()==null){
            return redirect('/');
        }
//        Distributed permissions throw routes check routes
        $action=$request->route()->getAction();
        $permissions=isset($action['role'])?$action['role']:null;
        //user without permissions in role
        if ($request->user()->hasAnyRole($permissions)||!$permissions){
            return $next($request);
        }
        return redirect('/');



    }
}
