<!DOCTYPE html>
<html>
    <head>
        <title>Subreddit Report</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <br>
            @foreach (['danger', 'warning', 'success', 'info'] as $key)
                @if(Session::has($key))
                    <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                @endif
            @endforeach
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subreddit</th>
                        <th>Number of Posts</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form method="post" action="{{action('SubredditController@filter')}}" enctype="multipart/form-data" >
                    @csrf
                    <tr>
                        <td><input type="text" class="form-control" name="subreddit_id" value=""></td>
                        <td><input type="text" class="form-control" name="subreddit" value=""></td>
                        <td><input type="text" class="form-control" name="noOfPost" value=""></td>
                        <td><button type="submit" class="btn btn-success">Search</button></td>
                    </tr>
                    </form>
                    @foreach($data as $subreddit)
                    <tr>
                        <td>{{$subreddit->subreddit_id}}</td>
                        <td>{{$subreddit->subreddit}}</td>
                        <td>{{$subreddit->noOfPost}}</td>
                        <td>
                            <a href="{{action('SubredditPostController@showSubredditPost', $subreddit->subreddit)}}" target="_blank" class="btn btn-success">
                                View Posts
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(!is_array($data))
                {{ $data->links()}}
            @endif
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>