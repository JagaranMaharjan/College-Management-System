@extends('layout.master')
@section('content')
    <div class="col-md-12">
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
                        <button class="btn btn-danger btn-xs">Delete</button>
                        <button class="btn btn-warning btn-xs">Edit</button>
                    </td>
                </tr>
            @endforeach
        </table>
        <center>{{$studentData->links()}}</center>
    </div>
@endsection