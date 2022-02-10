<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {
        $header = $request->header('Authorization');
        
        if(isset($header)){
            $emp=User::where("remember_token",$header)->get()->toArray();
            if (empty($emp[0]))
            {
                return response()->json(['message' => "UnAuthoeized API",'login'=>false], 400);
            }
            else{
                return $next($request);
            }
        }
        else{
            return response()->json(['message' => "UnAuthoeized",'login'=>false], 400);
        }
        
        // return $next($request);
        
        // return $next($request);
    }
}
