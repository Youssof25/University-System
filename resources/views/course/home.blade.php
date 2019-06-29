@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{\Session::get('success')}}
            </div>
        @endif

        <div class="row">
            <a href="{{url('/create/course')}}" class="btn btn-success">Create Course</a>
            <a href="{{url('/courses')}}" class="btn btn-default">All Courses</a>
        </div>
    </div>
@endsection