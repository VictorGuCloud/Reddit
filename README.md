## Introduction
This project is a simple solution for viewing Reddit sample data using Laravel 5.8 framework. 
## Steps to setup the solution and dependencies
#### Clone GitHub repository for this project to local and cd into the project.
#### Install Composer Dependencies with with the following command.
> Laravel 5.8 framework requires PHP version >= 7.1.3

		composer install
	
#### Create a copy of the .env file and generate an app encryption key
	
		copy .env.example .env
		php artisan key:generate
	
Then create an empty database for this application. Edit the **.env** file, fill in the **DB_HOST**, **DB_PORT**, **DB_DATABASE**, **DB_USERNAME**, and **DB_PASSWORD** options to match the credentials of the database. 
This solution uses laravel queue to insert data to database tables, it needs to set **QUEUE_CONNECTION** option to **`database`** in the **.env** file.

		QUEUE_CONNECTION=database

#### Migrate with the following command.
	
		php artisan migrate

#### Run following command can run the project and check functions developed.

		php artisan serve
		
## Steps to use the solution

#### Check and download sample data
Visit page http://127.0.0.1:8000/checkRedditFIle will check the file has been downloaded or not.
If the file has not been download, visit page http://127.0.0.1:8000/getRedditFIle can get the sample data file. When download finished, it will show message "File has been downloaded" and the **simple_data.json** file can be found in **storage\app\reddit** folder.

#### Import data to database using Laravel queue
Visit page http://127.0.0.1:8000/fileToDB will trigger functions that insert sample data to database tables using Laravel queue. Check table **jobs** in the database can see new jobs waiting to run.
Running following command will trigger jobs insert data to database tables

        php artisan queue:work --tries=1
        
#### Visit subreddit report page and subreddit post listing page
Visit page http://127.0.0.1:8000/showSubreddit can see the subreddit report page. Click **View Posts** button, will see the post listing page. e.g. http://127.0.0.1:8000/showSubredditPost/2007scape
