
<html>
    <body>
        @foreach($allPosts as $post)
            <!-- <a href="{{ route('posts.show', ['post' => $post->post_id]) }}"> -->
               <div>
                   <h4>{{$post->post_name}}</h4>
                   <h6>{{$post->date}} at {{ $post->start_time }} - {{ $post->end_time }}</h6>
                   <form action="/postuser" method="POST">
                   @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="post_id" value="{{ $post->post_id }}">
                        <input type="submit" value="Going" >
                   </form>
               </div>
            <!-- </a> -->
        @endforeach
    </body>
</html>
