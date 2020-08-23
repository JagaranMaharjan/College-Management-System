@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-md-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <center><h4>Enroll New Student</h4></center>
            <hr>
            <form action="{{route('add')}}" method="post" enctype="multipart/form-data">
                <!--to send data securely csrf_field method is called-->
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control", value="{{old('name')}}">
                    <div>
                        <p style="color: red;">{{$errors->first('name')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control", value="{{old('email')}}">
                    <div>
                        <p style="color: red;">{{$errors->first('email')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Choose Photo</label>
                    <input type="file" name="image" id="image" class="form-control", value="{{old('image')}}">
                    <div>
                        <p style="color: red;">{{$errors->first('image')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control", value="{{old('password')}}">
                    <div>
                        <p style="color: red;">{{$errors->first('password')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control", value="{{old('password_confirmation')}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Register</button>
                </div>

            </form>
        </div>
        <div class="col-md-8">
            <center><h4>Enrolled Student Data</h4></center>
            <hr>
            <table class="table table-hover">
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                @foreach($studentData as $key=>$studentDetail)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$studentDetail->name}}</td>
                        <td>{{$studentDetail->email}}</td>
                        <td><img src="{{url("public/lib/images/".$studentDetail->image)}}", width="50px", height="50px"></td>
                        <td>{{$studentDetail->created_at->DiffForHumans()}}</td>
                        <td>
                            <button class="btn btn-danger btn-xs"><a href="{{'delete'.'/'.$studentDetail->id}}">Delete</a></button>
                            <button class="btn btn-warning btn-xs"><a href="{{'edit'.'/'.$studentDetail->id}}">Edit</a></button>
                        </td>
                    </tr>
                @endforeach
            </table>
            <center>{{$studentData->links()}}</center>
        </div>
    </div>
@endsection