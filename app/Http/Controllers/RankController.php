<?php

namespace App\Http\Controllers;

use App\Rank;
use App\Select;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class RankController extends Controller
{
    public function index(Rank $rank)
    {
        return view('index')->with(['ranks' => $rank->getPaginateByLimit()]);
    }
    public function index_count(Rank $rank)
    {
        return view('index')->with(['ranks' => $rank->getPaginateByLimitcount()]);
    }
    public function index_user(Rank $rank, User $user)
    {
        $userId=$user['id'];
        return view('index_user')->with(['ranks' => $rank->where('user_id',$userId)->get(),'user'=>$user]);
    }
    public function serch_index(Rank $rank, Request $request)
    { 
        $input=$request['rank'];
        $input=$input['title'];
        if($input==null)
        {
            return redirect('/');
        }
        else
        {
        $rank = Rank::where('title', 'like', '%' . $input . '%')->get();
        return view('serch_index')->with(['ranks' => $rank]);
        }
        
    }
    public function serch_vote(Rank $rank, Request $request)
    { 
        $input=$request['rank'];
        $input=$input['title'];
        if($input==null)
        {
            return redirect('/');
        }
        else
        {
        $rank = Rank::where('title', 'like', '%' . $input . '%')->where('destroy','=',0)->get();
        return view('serch_vote')->with(['ranks' => $rank]);
        }
        
    }
    public function show(Rank $rank, User $user)
    {
        $userId=$rank['user_id'];
        $users=User::where('id',$userId)->get();
        $user=$users[0];
        $attentionSelect=Select::withCount('users')                   //selectsテーブルから投票数の多い順を取り出す
        ->orderBy('users_count','desc')->where('rank_id', $rank['id'])
        ->get();
        return view('show')->with(['selects'=>$attentionSelect,'rank'=>$rank, 'user'=>$user]);
    }
    public function show_user(Rank $rank)
    {
        $attentionSelect=Select::withCount('users')                   //selectsテーブルから投票数の多いnameを取り出す
        ->orderBy('users_count','desc')->where('rank_id', $rank['id'])
        ->get();
        return view('show_user')->with(['selects'=>$attentionSelect,'rank'=>$rank]);
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
        $userId = Auth::id();
        $rankId = $rank['id'];
        $counts = User::find($userId)->rank()
        ->where('rank_user.rank_id', '=', $rankId)
        ->where('rank_user.user_id', '=', $userId)
        ->get()->count();                                    //rank_userテーブルにrank_idとuser_idが存在するranksテーブルのカラム数を取得
        $select=$rank->selects()->get();
        
        if($counts==1)
            {
                return view('voted');
            }
        else
            {
                return view('vote_show')->with(['selects'=>$select, 'rank'=>$rank]);
            }
    }
    public function create_comment(Rank $rank, Comment $comment)
    {
        return view('create_comment')->with(['rank'=>$rank, 'comment'=>$comment]);
    }
    public function store_comment( Comment $comment, Rank $rank, User $user, Request $request)
    {
        $userId=Auth::id();
        $rankId=$rank['id'];
        $input=$request['comment'];
        $commentBody=$input['body'];
        $commentCount=strlen($commentBody);
        if($commentCount==0)
        {
            return view('error_comment');
        }
        else
        {
        Comment::create([
                "user_id"=>$userId,
                "rank_id"=>$rankId,
                "body"=>$commentBody
                ]);                             //commentsテーブルにuser?idとrank_idとbodyを保存
        return redirect('/');
        }
        
    }
    public function read_comment(Comment $comment, Rank $rank, User $user)
    {
        $rankId=$rank['id'];
        $comment=Comment::where('rank_id',$rankId)->orderBy('created_at','desc')->get();
        $user=User::get();
        $line='---------------------------------------------------------------------------------------------------';
        return view('read_comment')->with(['comments'=>$comment,'line'=>$line,'users'=>$user]);
    }
    public function store(Rank $rank, Select $select, Request $request)
    {
        $id = Auth::id();                      //認証したユーザのidを取得
        $rank['user_id']=$id;
        $input_1=$request['rank'];
        $input_2=$request['select'];
        $input_3=$request['image'];
        if($input_1==null || $input_2==null || $input_3==null)
        {
            return view('create_error');
        }
        else
        {
            $count_title=count($input_1);          //登録したお題の数を取得
            $count_select=count($input_2);         //登録した項目の数を取得
            $count_image=count($input_3);         //登録した項目の数を取得
        }
        if($count_title>=1 && $count_select>=2  && $count_select==$count_image)
        {
            $rank->fill($input_1)->save();         //ranksテーブルにuser_idとtitleを保存
            for($i=0; $i<$count_select; $i++)
            {
                $path = Storage::disk('s3')->putFile('rank', $input_3[$i], 'public');
                $image_path = Storage::disk('s3')->url($path);
                Select::create([
                "name"=>$input_2[$i],
                "rank_id"=>$rank->id,
                "image_path"=>$image_path
                ]);                             //selectsテーブルにnameとrank_idを保存
           
            }
        
            return redirect('/');
        }
        else
        {
            return view('create_error');
        }
    }
    public function store_vote(Rank $rank, Select $select, User $user, Request $request)
    {
        $rank['count']+=1;
        $rank->save();
        $input=$request['select'];
        $rankId=$rank['id'];
        $selectId=$input['id'];                    //選択したselectテーブルのidを取得
        $userId = Auth::id();                      //認証したユーザidの取得
        $user=User::find($userId);   
        $user->selects()->attach($selectId);       //select_userテーブルにカラムを追加
        $user->rank()->attach($rankId);            //rank_userテーブルにカラムを追加
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
