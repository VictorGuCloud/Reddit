<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateSubredditTaxonomy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        self::rmExistingIndex();
        DB::statement("ALTER TABLE `subreddit_taxonomy` ADD INDEX `idx_subreddit_posts` (`subreddit_id` ASC, `subreddit_post_id` ASC);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        self::rmExistingIndex();
    }
    
    private function rmExistingIndex(){
        $result = DB::select("SHOW INDEX FROM subreddit_taxonomy WHERE KEY_NAME = 'idx_subreddit_posts'");
        if(count($result) > 0){
            DB::statement("ALTER TABLE `subreddit_taxonomy` DROP INDEX `idx_subreddit_posts`;");
        }
    }
}
