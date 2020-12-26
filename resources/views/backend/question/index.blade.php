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
        <th>Câu hỏi</th>
        <th>Bài kiểm tra</th>
        <th>Ngày tạo</th>
      </tr>
    </thead>
    <tbody>
        @if(count($questions)>0)
        @foreach($questions as $key=>$question)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$question->question}}</td>
        <td>{{$question->quiz->name}}</td>
        <td>{{date('F d,Y',strtotime($question->created_at))}}</td>
        <td>
            <a href="{{route('question.show',[$question->id])}}"><button class="btn btn-primary">View</button></a>
        </td>
        <td>
            <a href="{{route('question.edit',[$question->id])}}"><button class="btn btn-primary">Edit</button></a>
        </td>
        <td>
            <form action="{{route('question.destroy',[$question->id])}}" id="delete-form{{$question->id}}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="
                if(confirm('Bạn có chắc chắn xóa không?')){
                event.preventDefault();
                document.getElementById('delete-form{{$question->id}}').submit();
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
  <div class="pagination pagination-centered">
   {{$questions->links()}}
  </div>
 
</div>
</div>
</div>

@endsection

