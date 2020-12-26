@extends('backend.layouts.master')

@section('title','get all quiz')
@section('content')
<example-component></example-component>
<div class="span9">
    <div class="content">
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="module">

  <h2>Tất cả bài kiểm tra</h2>
        
  <table class="table table-dark table-striped">
    <thead>
      <tr>
      <th>#</th>
        <th>User</th>
        </th>
       Bài kiểm tra
      </tr>
    </thead>
    <tbody>
        @if(count($quizzes)>0)
        @foreach($quizzes as $quiz)
        @foreach($quiz->users as $key=>$user)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$user->name}}</td>
        <td>{{$quiz->name}}</td>
       
       
       
        <td>
            <form action="/exam/remove" id="delete-form{{$quiz->id}}" method="POST">@csrf
               <input type="hidden" name="user_id" value="{{$user->id}}">
               <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
               <button class="btn btn-danger" type="submit">Remove</button>
            </form>
           
        </td>
      </tr>
      @endforeach
      @endforeach
      @else
      <td>Bạn chưa tạo bài kiểm tra nào</td>
      @endif
    </tbody>
  </table>
</div>
</div>
</div>

@endsection

