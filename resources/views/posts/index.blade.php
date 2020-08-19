
<html>
    <body>
        @foreach($allPosts as $post)
            <!-- <a href="{{ route('posts.show', ['post' => $post->post_id]) }}"> -->
               <div>
                   <h4>{{$post->post_name}}</h4>
                   <h6>{{$post->date}} at {{ $post->start_time }} - {{ $post->end_time }}</h6>
                   <a href="">Going</a>
               </div>
            <!-- </a> -->
        @endforeach
    </body>
</html>
