<?php

namespace App\Http\Controllers;

use App\Rank;
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
}
