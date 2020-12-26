@extends('backend.layouts.master')

@section('title','get all quiz')
@section('content')
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
        <th>Tên bài kiểm tra</th>
        <th>Mô tả</th>
        <th>Thời gian</th>
      </tr>
    </thead>
    <tbody>
        @if(count($quizzes)>0)
        @foreach($quizzes as $key=>$quiz)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$quiz->name}}</td>
        <td>{{$quiz->description}}</td>
        <td>{{$quiz->minutes}}</td>
        <td>
        <a href="{{route('quiz.question',[$quiz->id])}}"><button class="btn btn-inverse">Xem chi tiet</button></a>
        </td>
        <td>
            <a href="{{route('quiz.edit',[$quiz->id])}}">
                <button class='btn btn-primary'>Edit</button>
            </a>
            
        </td>
        <td>
            <form action="{{route('quiz.destroy',[$quiz->id])}}" id="delete-form{{$quiz->id}}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="
                if(confirm('Bạn có chắc chắn xóa không?')){
                event.preventDefault();
                document.getElementById('delete-form{{$quiz->id}}').submit();
                }else {event.preventDefault();}
            
                 " >Delete</button>
            </form>
           
        </td>
      </tr>
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

