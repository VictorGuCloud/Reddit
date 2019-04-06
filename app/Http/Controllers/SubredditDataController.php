<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubredditDataController extends Controller
{
    public function checkRedditFIle(){
        $result = app()->make('SubredditData')->checkSubredditFile();
        return $result ? "File has been downloaded" : "File has NOT been downloaded";
    }
    
    public function getRedditFIle(){
        app()->make('SubredditData')->getSubredditFile();
        return $this->checkRedditFIle();
    }
    
    public function fileToDB(){
        return app()->make('SubredditData')->fileToDB();
    }
}
