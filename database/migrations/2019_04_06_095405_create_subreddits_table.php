<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSubredditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subreddit', function (Blueprint $table) {
            $table->increments('subreddit_id');
            $table->string('subreddit', 255);
        });
        
        DB::statement("ALTER TABLE `subreddit` CHANGE COLUMN `subreddit_id` `subreddit_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subreddit');
    }
}
