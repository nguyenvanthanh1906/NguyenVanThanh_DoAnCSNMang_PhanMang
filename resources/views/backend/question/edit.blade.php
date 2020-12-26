@extends('backend.layouts.master')

    @section('title','create quiz')
    @section('content')
    <div class="span9">
        <div class="content">

        @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif

            <form action="{{route('question.update',[$question->id])}}" method="POST">@csrf
                {{method_field('PUT')}}
            <div class="module">
                <div class="module_name">
                    <h3>Edit question</h3>
                </div>
                <div class="module_body">
                    <div class="control-group">
                        <label for="" class='control-label'>Quiz</label>
                        <div class="controls">
                            <select name="quiz" id="" class="span8">
                            @foreach($quizzes as $key=>$quiz)
                                <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                            @endforeach
                            </select>
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        <label for="" class='control-label'>Question</label>
                        <div class="controls">
                            <input type="text" name='question' class='span8' placeholder='name of a quiz' value="{{$question->question}}">
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="control-group">
                            @foreach($question->answers as $key=>$answer)
                                <div class="">
                                <input type="text" class="span7" name="options[]" value="{{$answer->answer}}">
                                <input type="radio" name="correct_answer"  value="{{$key}}" @if ($answer->is_correct) {{'checked'}} @endif><span>is correct answer</span>
                                </div>
                                
                                
                            @endforeach



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