@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
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
                    <td><a href="{{route("admin.posts.edit",$post->id)}}">{{$post->user->name}}</a></td>
                        <td>{{$post->category ? $post->category->name : 'Uncategorized' }}</td>  
                        <td>{{$post->title}}</td>
                        <td>{{str_limit($post->body,15)}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr> 
                @endforeach
            @endif
        </tbody>
    </table>

@stop