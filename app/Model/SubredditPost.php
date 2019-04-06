<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubredditPost extends Model
{
    public $primaryKey="subreddit_post_id";
    public $timestamps = false;
}
