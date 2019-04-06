<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class SubredditTaxonomy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subreddit_taxonomy', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('subreddit_id');
            $table->Integer('subreddit_post_id');
        });
        
        DB::statement("ALTER TABLE `subreddit_taxonomy` CHANGE COLUMN `id` `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subreddit_taxonomy');
    }
}
