<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubredditController extends Controller
{
    public function showSubreddit(){
        $result = app()->make('Subreddit')->showSubreddit();
        return view('reddit.reddit')->with('data', $result);
    }
}
