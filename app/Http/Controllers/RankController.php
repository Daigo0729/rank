<?php

namespace App\Http\Controllers;

use App\Rank;
use App\Select;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class RankController extends Controller
{
    public function index(Rank $rank)
    {
        return view('index')->with(['ranks' => $rank->getPaginateByLimit()]);
    }
    public function serch(Rank $rank, Request $request)
    {
        $input=$request['rank'];
        $input=$input['title'];
        $ranks=Rank::get();
        $rank = Rank::where('title', 'like', '%' . $input . '%')->get();
        return view('serch')->with(['ranks' => $rank]);
        
    }
    public function show(Rank $rank)
    {
        $attentionSelect=Select::withCount('users')                   //selectsテーブルから投票数の多いnameを取り出す
        ->orderBy('users_count','desc')->where('rank_id', $rank['id'])
        ->get();
        return view('show')->with(['selects'=>$attentionSelect,'rank'=>$rank]);
    }
    public function show_user(Rank $rank, Select $select)
    {
        $select=$rank->selects()->get();                //selectsテーブルからrank_idが同じものを取得
        return view('show_user')->with(['rank'=>$rank]);
    }
    public function create()
    {
        return view('create');
    }
    public function vote_index(Rank $rank)
    {
        return view('vote_index')->with(['ranks'=>$rank->getPaginateByLimit()]);
    }
    public function vote_show(Select $select, Rank $rank)
    {
        $select=$rank->selects()->get();
        return view('vote_show')->with(['selects'=>$select, 'rank'=>$rank]);
    }
    public function store(Rank $rank, Select $select, Request $request)
    {
        $id = Auth::id();                      //認証したユーザのidを取得
        $rank['user_id']=$id;
        $input_0=$request['rank'];
        $rank->fill($input_0)->save();         //ranksテーブルにuser_idを保存
        $input_1=$request['rank'];    
        $rank->fill($input_1)->save();         //ranksテーブルにtitleを保存
        $input_2=$request['select'];
        foreach($input_2 as $select_2)
        {
        Select::create([
            "name"=>$select_2,
            "rank_id"=>$rank->id
            ]);                             //selectsテーブルにnameとrank_idを保存
       
        }
        return redirect('/');
    }
    public function store_vote(Select $select, User $user, Request $request)
    {
        $input=$request['select'];
        $selectId=$input['id'];                    //選択したselectテーブルのidを取得
        $userId = Auth::id();                      //認証したユーザidの取得
        $user=User::find($userId);             
        $user->selects()->attach($selectId);
        return redirect('/');
        
    }
    public function edit(Rank $rank)
    {
        $rank['destroy']=1;
        $rank->save();
        return redirect('/home');
    }
    public function destroy(Rank $rank)
    {
        $rank->delete();
        return redirect('/');
    }
    
}
