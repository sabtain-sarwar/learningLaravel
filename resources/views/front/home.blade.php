{{--@extends('layouts.app')--}}
@extends('layouts.blog-home')

@section('content')

    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- First Blog Post -->
                @if($posts)
                    @foreach($posts as $post)
                <h2>
                    <a href="#">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>{!! str_limit($post->body,100) !!}</p>
                <a class="btn btn-primary" href="/post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                    @endforeach
                @endif
                <!-- Pagination -->
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$posts->render()}}
                    </div>
                </div>
            </div>
            <!-- Blog Sidebar -->
            @include('includes.front_sidebar')
        </div>
        <!-- /.row -->


{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-10 col-md-offset-1">--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading">Dashboard</div>--}}

{{--                <div class="panel-body">--}}
{{--                    You are logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
