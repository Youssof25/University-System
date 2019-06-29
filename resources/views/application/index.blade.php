@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>User ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Phone Number</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{$application->id}}</td>
                    <td>{{$application->user_id}}</td>
                    <td>{{$application->first_name}}</td>
                    <td>{{$application->last_name}}</td>
                    <td>{{$application->email}}</td>
                    <td>{{$application->phone_number}}</td>
                    <td><a href="{{action('ApplicationController@edit',$application->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{action('ApplicationController@destroy', $application->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection