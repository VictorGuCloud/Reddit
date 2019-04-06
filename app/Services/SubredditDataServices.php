<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubredditDataServices
 *
 * @author Victor
 */
namespace App\Services;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\Queue;
set_time_limit(0);

class SubredditDataServices {
    
    public function checkSubredditFile(){
        return !Storage::exists('/reddit/sample_data.json') ? false : true;
    }
    
    public function getSubredditFile(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://files.pushshift.io/reddit/comments/sample_data.json');
        $data = $response->getBody();
        if(!Storage::exists('/reddit')) {
            Storage::makeDirectory('/reddit', 0775, true);
        }
        if(!Storage::exists('/reddit/sample_data.json')){
            Storage::put('reddit/sample_data.json',$data);
        }
    }
    
    public function fileToDB(){
        if(!Storage::exists('/reddit/sample_data.json')){
            return "File has NOT been downloaded";
        }
        $fileName = Storage::disk()->path('reddit/sample_data.json');
        $lines = self::getLinesFromFile($fileName);
        $count = 0;
        foreach ($lines as $line) {
            if(isset($line)){
                $data = json_decode($line);
                $job = new \App\Jobs\redditToDB($data);
                dispatch($job);
            }
            $count++;
        }
        return "There are " .$count. " jobs created in the queue";
    }

    private static function getLinesFromFile($fileName) {
        if (!$fileHandle = fopen($fileName, 'r')) {
            return;
        }
        while (false !== $line = fgets($fileHandle)) {
            yield $line;
        }
        fclose($fileHandle);
    }
    
}
