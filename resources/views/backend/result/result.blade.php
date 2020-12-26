@extends('backend.layouts.master')

@section('title','get all quiz')
@section('content')
<div class="span9">
<div class="container">
  <h2>Result</h2>
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Quiz</th>
        <th>Total Question</th>
        <th>Attempt Question</th>
        <th>Correct Answer</th>
        <th>Wrong Answer</th>
        <th>Percentage</th>
      </tr>
    </thead>
    <tbody>
    @foreach($quiz as $q)
      <tr>
        <td>1</td>
        <td>{{$q->name}}</td>
        <td>{{$totalQuestions}}</td>
        <td>{{$attemptQuestion}}</td>
        <td>{{$userCorrectedAnswer}}</td>
        <td>{{$userWrongAnswer}}</td>
        <td>{{round($percentage,2)}}</td>
      </tr>
    @endforeach 
    </tbody>
  </table>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Question</th>
        <th>Total Question</th>
        <th>Answer given</th>
        <th>Result</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($results as $key=>$result)
      <tr>
        <td>1</td>
        <td>{{$key+1}}</td>
        <td>{{$result->question->question}}</td>
        <td>{{$result->answer->answer}}</td>
        @if($result->answer->is_correct)
        <td>Correct</td>
        @else
        <td>Incorrect</td>
        @endif
      </tr>
    @endforeach 
    </tbody>
  </table>
</div>
</div>

@endsection

