<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends HomeController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit() 
    {
        return view('users.edit');
    }

    public function view() 
    {
        return view('users.view');
    }

    public function notAllowed()
    {
        return view('not_allowed');
    }
    
    public function showDatabase()
    {
        $badUsers = DB::table('user_logs')
                ->where('user_id', Auth::user()->id)
                ->where('number_of_false_status', '>=' , 3)
                ->get();

        $goodUsers = DB::table('users')->join('user_logs', function ($join) {
            $join->on('users.id', '!=', 'user_logs.user_id');
        })
        ->get();

        return view('show_database',[
            'badUsers' => $badUsers,
            'goodUsers' => $goodUsers
        ]);
    }
}