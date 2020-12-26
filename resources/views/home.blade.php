@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row ">
   
        <div class="col-md-8">
        @if(Session::has('error'))
        <div class='alert alert-danger'>{{Session::get('error')}}</div>
    @endif
            <div class="card">
            
                <div class="card-header">{{ __('Dashboard') }}</div>
                    @if($isExamAssigned)
                    @foreach($quizzes as $quiz)

                <div class="card-body">
                    <p><h3>{{$quiz->name}}</h3></p>
                    <p>Giới thiệu bài thi:{{$quiz->description}}</p>
                    <p>Thời gian:{{$quiz->minutes}}</p>
                    <p>Số câu hỏi:{{$quiz->questions->count()}}</p>
                    <p>
                         @if(!in_array($quiz->id,$wasQuizCompleted))
                         <a href="/quiz/getquestion/{{$quiz->id}}">
                        <button class="btn btn-success">Bắt đầu làm bài</button>
                        </a>
                        @else <span class="float-right ">Đã hoàn thành</span>
                                <a href="/result/user/{{auth()->user()->id}}/quiz/{{$quiz->id}}">Xem kết quả</a>
                        @endif

                      
                    </p>
                </div>
                    @endforeach
                  @else
                  <p>Bạn không có kì thi nào</p>
                  @endif

                
            </div>
        </div>
        <div class="col-md-4">
        <div class="card">
        <div class="card-header">User</div>
        <div class="card-body">
        <p>Name: {{auth()->user()->name}}</p>
        <p>Email: {{auth()->user()->email}}</p>
        <p>Occupation: {{auth()->user()->occupation}}</p>
        <p>Phone: {{auth()->user()->phone}}</p>
        <p>Address: {{auth()->user()->address}}</p>
        </div>
        </div>
        </div>
    </div>
    
</div>
@endsection
