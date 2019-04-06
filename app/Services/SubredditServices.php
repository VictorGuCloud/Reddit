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
    
}
