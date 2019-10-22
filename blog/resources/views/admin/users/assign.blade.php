@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Users {{$user->name}}</div>

                    <div class="card-body">
                        <form action="{{route('admin.users.updates',['user'=>$user->id])}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            @foreach($roleuser as $role)
                                <div class="form-check">
                                    @if($role->role_id == '4')
                                        @foreach($users as $user)
                                            @if($user->id == $role->user_id)

                                                <input type="checkbox"  name="assign_to_id" value="{{ $user->id }}"
                                                >
                                                <label>{{ $user->name }}</label>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>

                            @endforeach

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
