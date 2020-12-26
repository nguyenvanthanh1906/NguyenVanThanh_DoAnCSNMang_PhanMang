@extends('backend.layouts.master')

@section('title','get all quiz')
@section('content')
<div class="span9">
    <div class="content">
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="module">
@foreach($quizzes as $quiz)
  <h2>{{$quiz->name}}</h2>
        
  <table class="table">
    
    <tbody>
       
        @foreach($quiz->questions as $key=>$question)
      <tr>
      
        <td><h4>{{$question->question}}</h4>
        
        

        @foreach($question->answers as $answer)
        <div class="span8">{{$answer->answer}}
        @if($answer->is_correct)    
        <span class="badge badge-success ">correct</span>

        @endif
        </div>
        @endforeach
      
      
      @endforeach
      </td>
      </tr>
    </tbody>
  </table>
  
 @endforeach
</div>
</div>
</div>

@endsection

