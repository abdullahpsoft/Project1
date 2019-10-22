@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Users {{$department->name}}</div>

                    <div class="card-body">
                        <form action="{{route('admin.department.update',['department'=>$department->id])}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <input name="id" id="id" type="text" value="{{$department->id}}" disabled>
                            <input name="name" id="name" type="text" value="{{$department->name}}">
                            <input name="maxemployees" id="maxemployees" type="text" value="{{$department->maxemployees}}">


                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
