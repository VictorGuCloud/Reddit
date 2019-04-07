<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubredditController extends Controller
{
    public function showSubreddit(){
        $result = app()->make('Subreddit')->showSubreddit();
        return view('reddit.reddit')->with('data', $result);
    }
    
    public function filter(Request $request){
        $data = $request->input();
        $result = app()->make('Subreddit')->filterSubreddit($data);
        return view('reddit.reddit')->with('data', $result);
    }
}
