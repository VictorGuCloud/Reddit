<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subreddit extends Model
{
    protected $table = 'subreddit';
    public $primaryKey="subreddit_id";
    public $timestamps = false;
}
