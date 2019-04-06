<!DOCTYPE html>
<html>
    <head>
        <title>Subreddit Post</title>
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
                        <th>Post ID</th>
                        <th>Subreddit</th>
                        <th>Permalink</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $post)
                    <tr>
                        <td>{{$post->subreddit_post_id}}</td>
                        <td>{{$post->reddit_post_id}}</td>
                        <td>{{$post->subreddit}}</td>
                        <td>{{$post->permalink}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>