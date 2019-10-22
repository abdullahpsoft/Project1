@extends('layouts.app')

@section('content')
<div class="container">
    @hasrole('superadmin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    @endhasrole
    @hasrole('user')                 <!-- //**********************user homepage code here************************// -->
    <h1 class="text-center">Task Home Page</h1>
    @foreach($tasks as $task)

    <div class="card text-center">
        <form action="{{route('home.update',['task'=>$task->id])}}" method="POST">
            @csrf
            {{method_field('PUT')}}
        @if( $task->status == 'pending')
            <div class="card-header " style="background: red; color: white; font-weight: bold" >
                 {{Str::upper($task->status)}}
            </div>
        @endif
            @if( $task->status == 'completed')
                <div class="card-header " style="background: limegreen; color: white; font-weight: bold " >
                    {{Str::upper($task->status)}}
                </div>
            @endif
            @if( $task->status == 'inprogress')
                <div class="card-header " style="background: deepskyblue; color: white; font-weight: bold " >
                    {{Str::upper($task->status)}}
                </div>
            @endif

            <div class="card-body">

            <h5 name="title"
                class="card-title">{{$task->title}}</h5>
            <p class="card-text">{{$task->details}}</p>

                <?php  $date_now = date("Y-m-d"); // this format is string comparable
                ?>
            @if( $task->status == 'pending')

                    <input id="status" type="radio" name="status" value="inprogress" />
                <label>Mark In Progress</label>
                    <input  id="status" type="radio" name="status" value="completed" />
                    <label>Mark Complete</label>
                       @if($date_now <= $task->due_date)
                           <br>   <button type="submit" class="btn btn-primary">Update</button>

                       @endif

                @endif
                @if( $task->status == 'inprogress')

                    <input  id="status" type="radio" name="status" value="completed" />
                    <label>Mark Complete</label>
                    @if($date_now <= $task->due_date)
                        <br>   <button type="submit" class="btn btn-primary">Update</button>

                    @endif

                @endif


            </div>
            @if($date_now > $task->due_date)
        <div class="card-footer text-muted" style="background: red">
           Task is expired and due date was :  {{$task->due_date}}
        </div>
                @endif
            <div class="card-footer text-muted" style="">
                {{$task->due_date}}
            </div>
        </form>
    </div>
<br><br>
    @endforeach



    @endhasrole                      <!-- //**********************end of user homepage code ************************// -->

</div>
@endsection
