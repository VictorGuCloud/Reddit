<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;
use Illuminate\Support\Facades\DB;

/**
 * Description of SubredditServices
 *
 * @author Victor
 */
class SubredditServices {
    
    public function showSubreddit(){
        /*$result = DB::select("
                    SELECT subreddit_id, subreddit, COUNT(*) AS noOfPost 
                        FROM subreddit group by subreddit;
                ");*/
        $result = DB::table('subreddit')
                ->select('subreddit_id','subreddit', DB::raw('COUNT(*) as noOfPost'))
                ->groupBy('subreddit')
                ->paginate(10);
        return $result;
    }
    
    public function filterSubreddit($data){
        $subreddit_id = $data['subreddit_id'];
        $subreddit = $data['subreddit'];
        $noOfPost = $data['noOfPost'];
        if(!isset($subreddit_id) && !isset($subreddit) && !isset($noOfPost)){
            return $this->showSubreddit();
        }
        $sql = "SELECT subreddit_id, subreddit, COUNT(*) AS noOfPost FROM subreddit group by subreddit having ";
        $sql .= isset($subreddit_id) ? "subreddit_id = '$subreddit_id' " : "";
        $sql .= isset($subreddit_id) && isset($subreddit) ? "and " : "";
        $sql .= isset($subreddit) ? "subreddit like '%$subreddit%' " : "";
        $sql .= isset($subreddit) && isset($noOfPost) ? "and " : "";
        $sql .= isset($noOfPost) ? "noOfPost = '$noOfPost' " : "";
        $result = DB::select($sql);
        return $result;
    }
    
    
}
