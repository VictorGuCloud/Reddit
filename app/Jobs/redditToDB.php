<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

class redditToDB implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::transaction(function(){
            
            // data to subreddit
            $subreddit = new \App\Model\Subreddit();
            $subreddit->subreddit = $this->data->subreddit;
            $subreddit->save();

            // data to subreddit_post
            $subredditPost = new \App\Model\SubredditPost();
            $subredditPost->reddit_post_id = $this->data->id;
            $subredditPost->permalink = $this->data->permalink;
            $subredditPost->author = $this->data->author;
            $subredditPost->created_utc = $this->data->created_utc;
            $subredditPost->score = $this->data->score;
            $subredditPost->save();

            // data to subreddit_taxonomy
            $subreddit_id = $subreddit->subreddit_id;
            $subreddit_post_id = $subredditPost->subreddit_post_id;
            DB::INSERT("INSERT INTO `subreddit_taxonomy` (`subreddit_id`, `subreddit_post_id`) VALUES ($subreddit_id, $subreddit_post_id);");

        });
    }
}
