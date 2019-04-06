<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubredditPostController extends Controller
{
    public function showSubredditPost($subreddit){
        $result = app()->make('SubredditPost')->showSubredditPost($subreddit);
        return view('reddit.redditPost')->with('data', $result);
    }
}
