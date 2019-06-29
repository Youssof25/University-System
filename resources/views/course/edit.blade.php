@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="row">
            <form method="post" action="{{action('CourseController@update', $id)}}" >
                {{csrf_field()}}
                <input name="_method" type="hidden" value="POST">
                <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value={{$courses->title}} />
                </div>
                <div class="form-group">
                    <label for="description">Course Description:</label>
                    <textarea cols="5" rows="5" class="form-control" name="description">{{$courses->description}}</textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" value={{$courses->id}} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
