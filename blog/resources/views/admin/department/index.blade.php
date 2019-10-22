@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Departments</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>

                                <th scope="col">Name</th>
                                <th scope="col">No of Employees</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <th>{{ $department->name }}</th>
                                    <th>{{ $department->maxemployees }}</th>
                                    <th><a href="{{ route('admin.department.edit', $department->id) }}">
                                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                        </a></th>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
