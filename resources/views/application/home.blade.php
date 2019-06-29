@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{\Session::get('success')}}
            </div>
        @endif

        <div class="row">
            <a href="{{url('/create/application')}}" class="btn btn-success">Create Application</a>
            <a href="{{url('/applications')}}" class="btn btn-default">All Applications</a>
        </div>
    </div>
@endsection