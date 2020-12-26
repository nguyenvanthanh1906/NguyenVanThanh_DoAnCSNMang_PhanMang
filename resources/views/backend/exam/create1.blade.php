@extends('backend.layouts.master')

    @section('title','create quiz')
    @section('content')
    <div class="span9">
        <div class="content">

        @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif

            <form action="{{route('exam.assign')}}" method="POST">@csrf
            <div class="module">
                <div class="module_name">
                    <h3>Assign question</h3>
                </div>
                <div class="module_body">
                    <div class="control-group">
                        <label for="" class='control-label'>Quiz name</label>
                        <div class="controls">
                            <select name="quiz_id" id="" class="span8">
                                @foreach($quizzes as $key=>$quiz)
                                    <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                                @endforeach
                            </select>
                            @error('quiz')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                       
                        <label for="" class='control-label'>User</label>
                        <div class="controls">
                            <select name="user_id" id="" class="span8">
                                @foreach($users as $key=>$user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('user')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        
                     

                        
                        <div class="controls">
                            <button type='submit' class='btn btn-success'>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    @endsection