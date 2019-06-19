@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">
        {!! Form::open(['method' =>'POST','action'=>'AdminCategoriesController@store']) !!}
            <div class='form-group'>
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null ,['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        @if($categories)
            <table class='table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $Category)
                        <tr>
                        <td>{{$Category->id}}</td>
                        <td><a href="{{route('admin.categories.edit',$Category->id)}}">{{$Category->name}}</a></td>
                        <td>{{$Category->created_at ? $Category->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$Category->updated_at ? $Category->updated_at->diffForHumans() : 'no date'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
   

@stop