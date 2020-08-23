@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <center><h4>Update Student</h4></center>
            <hr>
            <form action="{{route('editUserAction')}}" method="post" enctype="multipart/form-data">
                <!--to send data securely csrf_field method is called-->
                {{csrf_field()}}
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control", value="{{$userData->id}}">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control", value="{{$userData->name}}">
                    <div>
                        <p style="color: red;">{{$errors->first('name')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control", value="{{$userData->email}}">
                    <div>
                        <p style="color: red;">{{$errors->first('email')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Choose Photo</label>
                    <input type="file" name="image" id="image" class="form-control", value="{{$userData->image}}">
                    <div>
                        <p style="color: red;">{{$errors->first('image')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
        <div class="col-md-4">
            <img src="{{url("public/lib/images/".$userData->image)}}", height="500px", width="500px">
        </div>
    </div>
@endsection