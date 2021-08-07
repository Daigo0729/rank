<?php

namespace App\Http\Controllers;

use App\Rank;
use App\Select;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index(Rank $rank)
    {
        return view('index')->with(['ranks' => $rank->getPaginateByLimit()]);
    }
    public function show(Rank $rank)
    {
        return view('show')->with(['rank'=>$rank]);
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
        return redirect('/ranks/' . $rank->id);
    }
    public function store_vote(Select $select)
    {
        dd($select->name);
    }
    public function edit(Rank $rank)
    {
        return view('edit')->with(['rank'=>$rank]);
    }
    public function update(Rank $rank, Request $request)
    {
        $input=$request['rank'];
        $rank->fill($input)->save();
        return redirect('/ranks/' . $rank->id);
    }
    public function destroy(Rank $rank)
    {
        $rank->delete();
        return redirect('/');
    }
    
}
