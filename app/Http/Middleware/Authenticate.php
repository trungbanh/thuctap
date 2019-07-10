<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        $user = $request->session()->get('user');
        if (!($user instanceof \App\Model\Author && $user->id)) {
            return route('logon');
        }
        
        return null;
    }
}
