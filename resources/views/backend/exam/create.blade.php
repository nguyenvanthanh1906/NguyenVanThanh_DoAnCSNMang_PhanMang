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
                        <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        
      </tr>
    </thead>
    <tbody>
        @if(count($users)>0)
        @foreach($users as $key=>$user)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        
        
       
        <td>
            <input type="checkbox" value="{{$user->id}}" name="user_id[]">
        </td>
       
           
        
      </tr>
      @endforeach
      @else
      <td>Bạn chưa tạo user </td>
      @endif
    </tbody>
  </table>
  <div class="pagination pagination-centered">
   {{$users->links()}}
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