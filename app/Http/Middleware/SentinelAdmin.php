<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Sentinel;
use App\Models\User;

class SentinelAdmin
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
        if(!Sentinel::check())
            return redirect('admin/signin')->with('info', 'You must be logged in!');
        elseif(!Sentinel::inRole('admin'))
            return redirect('my-account');

        $tasks_count = Task::where('user_id', Sentinel::getUser()->id)->count();
        $request->attributes->add(['tasks_count' => $tasks_count]);
        
//        $userPermissions = User::select('*')
//                ->with('user_permissions')
//                ->first();
//        $request->attributes->add(['userPermissions' => $userPermissions]);
        return $next($request);
    }
}
