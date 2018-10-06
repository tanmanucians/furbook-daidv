@extends('layouts.master')

@section('header')
	@if(isset($breed))
		All cats of {{$breed->name}}
	@else
		All cats
	@endif
	<a class="btn btn-primary pull-right" href="{{route('cats.create')}}">Add new cat</a>
	<div class="clearfix"></div>
@endsection

@section('content')
    <table class="table table-border">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Breed name</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            @foreach ($cats as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td><a href="{{route('cats.show', $cat->id)}}">{{$cat->name}}</a></td>
                <td>{{$cat->date_of_birth}}</td>
                <td><a href="/cats/breeds/{{$cat->breed->name}}">{{$cat->breed->name}}</a></td>
                <td><a class="btn btn-warning" href="{{route('cats.edit', $cat->id)}}">Edit</a></td>
                <td>
                    <form action="{{route('cats.destroy', $cat->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection