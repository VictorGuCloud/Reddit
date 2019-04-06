<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSubredditPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subreddit_posts', function (Blueprint $table) {
            $table->increments('subreddit_post_id');
            $table->string('reddit_post_id', 45);
            $table->string('permalink', 500);
            $table->string('author', 500);
            $table->Integer('created_utc');
            $table->Integer('score');
        });
        
        DB::statement("ALTER TABLE `subreddit_posts` CHANGE COLUMN `subreddit_post_id` `subreddit_post_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;");
        DB::statement("ALTER TABLE `subreddit_posts` CHANGE COLUMN `score` `score` INT(1) NOT NULL ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subreddit_posts');
    }
}
