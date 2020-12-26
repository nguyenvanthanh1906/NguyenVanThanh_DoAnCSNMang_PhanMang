@extends('backend.layouts.master')

    @section('title','create quiz')
    @section('content')
    <div class="span9">
        <div class="content">

        @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif

            <form action="{{route('question.store')}}" method="POST">@csrf
            <div class="module">
                <div class="module_name">
                    <h3>Create question</h3>
                </div>
                <div class="module_body">
                    <div class="control-group">
                        <label for="" class='control-label'>Quiz name</label>
                        <div class="controls">
                            <select name="quiz" id="" class="span8">
                                @foreach(App\Quiz::all() as $key=>$quiz)
                                    <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                                @endforeach
                            </select>
                            @error('quiz')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        <label for="" class='control-label'>Câu hỏi</label>
                        <div class="controls">
                            <textarea type="text" name='question' class='span8' placeholder='description' >{{old('description')}}</textarea>
                            @error('question')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        
                        <label for="" class='control-label'>Câu trả lời</label>
                        <div class="controls">
                            @for($i=0;$i< 4;$i++)
                                <input type="text" class="span7 @error('name') border-blue @enderror" name="options[]" required="">
                                <input type="radio" name="correct_answer" value="{{$i}}"><span>Câu trả lời đúng</span>
                            @endfor
                            @error('answer')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
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