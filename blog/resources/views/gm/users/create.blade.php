@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Task</div>

                    <div class="card-body">
                        <form action="{{route('gm.users.store')}}" method="POST">
                            {{ csrf_field() }}
                            <label for="name"> Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="title" id="title"  placeholder="Title" type="text" value=""><br><br>

                            <label for="name"> Details:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <input name="details" id="details" placeholder="Details" type="text" value=""><br><br>

                            <label for="name"> Status:</label>
                            <input name="status" id="status" placeholder="status" type="text" value=""><br><br>

                            <label for="name"> Due Date:</label>
                            <input name="date" id="date" placeholder="yyyy/mm/dd" type="text" value=""><br><br>

                            <button type="submit" class="btn btn-success">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
