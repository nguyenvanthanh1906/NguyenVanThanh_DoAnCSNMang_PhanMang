@extends('backend.layouts.master')

@section('title','get all quiz')
@section('content')
<div class="span9">
    <div class="content">
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="module">

  <h2>{{$question->question}}</h2>
        
  <table class="table table-dark table-striped">
   
    <tbody>
        
        @foreach($question->answers as $answer)
      <tr>
        <td>{{$answer->answer}}
       @if($answer->is_correct)
            <span class="badge badge-success pull-right">correct</span>
       @endif
       </td>
      </tr>
      @endforeach
     
    </tbody>
  </table>
  
</div>
<div class="module-foot" style="display:flex; ">
           <a href="{{route('question.edit',[$question->id])}}"><button class="btn btn-primary">Edit</button></a>
       
       
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
         
  </div>      
</div>
</div>

@endsection

