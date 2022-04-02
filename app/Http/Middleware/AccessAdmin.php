<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Support\Facades\Route;
class AccessAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // protected $admin;
    // public function __construct(Admin $admin){
    //     $this->admin = $admin;
    // }
  
    public function handle($request, Closure $next)
    {
      

        // $actions =  Route::getCurrentRoute()->getAction();

        // $roles = isset($actions['roles']) ? $actions['roles'] : null;
            
        // if($this->admin->hasRole($roles) || !$roles){
        //         return $next($request);
        //     }else{
        //       return abort(401);   
        //     }
        if(Auth::user()->hasAnyRoles(['admin','author'])){
            return $next($request);
        }
        return redirect('/dashboard');
        }
        
       
    
}
