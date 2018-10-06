@extends('layouts.master')

@section('header')
    <a href="{{route('cats.index')}}">Back to overview</a>
    <h2>{{$cat->name}}</h2>
    <a class="btn btn-warning" href="{{route('cats.edit', $cat->id)}}">
        <span class="glyphicon glyphicon-edit"></span>
        Edit
    </a>
    <form action="{{route('cats.destroy', $cat->id)}}"
        method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <a class="btn btn-danger" href="javascript:void(0);" onclick="$(this).parent().submit();">
            <span class="glyphicon glyphicon-trash"></span>
            Delete
        </a>
    </form>
    
    <p>Last edited: {{$cat->updated_at->diffForHumans()}}</p>
@endsection

@section('content')
    <p>Date of birth: {{$cat->date_of_birth}}</p>
    <p>
        @if($cat->breed)
            {{link_to('cats/breeds/' . $cat->breed->name, $cat->breed->name)}}
        @endif
    </p>
@endsection