
<html>
    <body>
        @foreach($allPosts as $post)
            <a href="{{ route('posts.show', ['post' => $post->id]) }}">
               <div>
                   <h4>Request: {{ $post->id }}</h4>
                   <h6>{{$post->date}} at {{ $post->start_time }} - {{ $post->end_time }}</h6>
               </div>
            </a>:
        @endforeach
    </body>
</html>
