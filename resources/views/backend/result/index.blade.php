@extends('backend.layouts.master')

@section('title','get all quiz')
@section('content')
<div class="span9">
    <div class="content">
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="module">

  <h2>Kết quả</h2>
        
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
          <a href="/result/{{$user->id}}/{{$quiz->id}}">
            <button class="btn btn-success">View Result</button>
          </a>
           
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

