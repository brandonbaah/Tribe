
<html>
    <body>
        @foreach($posts as $post)
            <a href="{{ route('posts.show', ['post' => $post->id]) }}">
               <div>
                   <h4>{{$post->name}}</h4>
                   <h6>{{$post->date}} at {{ $post->start_time }} - {{ $post->end_time }}</h6>
                   <form action="/postuser" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="submit" value="{{ in_array(Auth::user()->id, $post->users->pluck('id')->toArray()) == true ? 'Attending' : 'Attend' }}">
                   </form>
                   <h5>Hosted by {{ Auth::user()->id == $post->user_id ? 'You' :  $post->getUser($post->user_id) }}</h5>
        @endforeach
    </body>
</html>