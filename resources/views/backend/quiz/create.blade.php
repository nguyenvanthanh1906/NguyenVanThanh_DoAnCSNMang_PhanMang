@extends('backend.layouts.master')

    @section('title','create quiz')
    @section('content')
    <div class="span9">
        <div class="content">

        @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif

            <form action="{{route('quiz.store')}}" method="POST">@csrf
            <div class="module">
                <div class="module_name">
                    <h3>Create quiz</h3>
                </div>
                <div class="module_body">
                    <div class="control-group">
                        <label for="" class='control-label'>Quiz name</label>
                        <div class="controls">
                            <input type="text" name='name' class='span8' placeholder='name of a quiz' value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        <label for="" class='control-label'>Description</label>
                        <div class="controls">
                            <textarea type="text" name='description' class='span8' placeholder='description' >{{old('description')}}</textarea>
                            @error('description')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        <label for="" class='control-label'>Quiz time</label>
                        <div class="controls">
                            <input type="text" name='minutes' class='span8' placeholder='time of a quiz' value="{{old('minutes')}}">
                            @error('minutes')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        <label for="" class='control-label'>Questions per page</label>
                        <div class="controls">
                            <input type="text" name='paging' class='span8' placeholder='questions per page' value="{{old('paging')}}">
                            @error('paging')
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