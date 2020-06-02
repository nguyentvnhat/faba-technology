<?php 

namespace App\Http\Middleware\user;

use Closure;
use DB;
use Auth;

class create_user
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
        $currentUserId = Auth::user()->id;
        $check =  DB::table('role_has_permissions')
            ->join('permissions', 'permissions.permission_id', '=', 'role_has_permissions.permission_id')
            ->where('role_has_permissions.role_id', Auth::user()->role_id)
            ->where('permissions.permission_name', 'create_user')->first();
    
        if ($check == null) {
            $user = DB::table('user_logs')->where('user_id', $currentUserId)->first();

            if (!empty($exist)) {
                DB::table('user_logs')->where('user_id', $currentUserId)->update(['number_of_false_status' => $exist->number_of_false_status + 1]);
            } else {
                $log = [
                    'user_id' => $currentUserId,
                    'permission_id' => 1,
                    'action_at' => \Carbon\Carbon::now()
                ];
                DB::table('user_logs')->insert($log);
            }
            return  redirect('not_allowed');
        } else {
            return $next($request);
        }
    }
}