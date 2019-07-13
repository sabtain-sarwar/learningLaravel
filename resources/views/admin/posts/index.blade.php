 @extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Title</th>
                <th>User</th>
                <th>Category</th>
{{--                <th>Body</th>--}}
                <th>Post Link</th>
                <th>Comments</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>
            @if($posts) <!-- if the post variable exists -->
                @foreach($posts as $post) <!-- taking the object out of there -->
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400*400'}}"></td>
                        {{-- <td>{{$post->photo->id}}</td> --}}
                        <td><a href="{{route("admin.posts.edit",$post->id)}}">{{$post->title}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category ? $post->category->name : 'Uncategorized' }}</td>
{{--                        <td>{{str_limit($post->body,15)}}</td>--}}
                        {{-- <td><a href="{{route('home.post',$post->id)}}">View Post</a></td> --}}
                        <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
                        <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr> 
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-6">
            {{$posts->render()}} {{-- we use a global function render here --}}
        </div>
    </div>

@stop