@extends('layouts.admin')

 {{-- The reason why we're doing this,bcz we want this styles only run o this page and we don;t have a lot of requesting
 our application --}}
@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

@stop

@section('content')

    <h1>Upload Media</h1>
    {{-- the reason why we give it a classs is so that way dropzone can actually work.That's the way we link it  --}}
    {!! Form::open(['method' =>'POST','action'=>'AdminMediasController@store','class'=>'dropzone']) !!}
    
    {!! Form::close() !!}

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@stop