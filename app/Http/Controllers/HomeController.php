<?php

namespace App\Http\Controllers;

use App\Rank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Rank $rank)
    {
        $userId = Auth::id();                      //認証したユーザのidを取得
        $user=User::find($userId);
        $rank=$user->ranks()->get();
        return view('home')->with(['ranks'=>$rank]);
    }
}
