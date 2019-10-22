@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create User</div>

                    <div class="card-body">
                        <form action="{{route('gm.users.store')}}" method="POST">
                            {{ csrf_field() }}
                            <label for="name"> Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="name" id="name"  placeholder="User Name" type="text" value=""><br><br>
                            <label for="name"> Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <input name="email" id="email" placeholder="User Email" type="text" value=""><br><br>

                            <label for="name"> Password:</label>
                            <input name="password" id="password" placeholder="User Password" type="text" value=""><br><br>

                            <button type="submit" class="btn btn-success">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
