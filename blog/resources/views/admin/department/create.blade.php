@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Department</div>

                    <div class="card-body">
                        <form action="{{route('admin.department.store')}}" method="POST">
                            {{ csrf_field() }}
                            <input name="name" id="name" type="text" value="">
                            <input name="maxemployees" id="maxemployees" type="text" value="">


                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
