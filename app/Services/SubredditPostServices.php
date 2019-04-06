<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;
use Illuminate\Support\Facades\DB;

/**
 * Description of SubredditPostServices
 *
 * @author Victor
 */
class SubredditPostServices {
    
    public function showSubredditPost($subreddit){
        $result = DB::select("
                    SELECT subreddit_posts.subreddit_post_id,reddit_post_id,subreddit,permalink 
                    FROM subreddit_taxonomy 
                        JOIN subreddit ON subreddit.subreddit_id = subreddit_taxonomy.subreddit_id
                        JOIN subreddit_posts ON subreddit_posts.subreddit_post_id = subreddit_taxonomy.subreddit_post_id
                    WHERE subreddit.subreddit = '$subreddit'
                ");
        return $result;
    }
}
