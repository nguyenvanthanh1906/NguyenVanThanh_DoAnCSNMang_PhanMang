@extends('backend.layouts.master')

    @section('title','create quiz')
    @section('content')
    <div class="span9">
        <div class="content">

        @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif

            <form action="{{route('user.update',[$user->id])}}" method="POST">@csrf
                {{method_field('PUT')}}
            <div class="module">
                <div class="module_name">
                    <h3>Edit User</h3>
                </div>
                <div class="module_body">
                    <div class="control-group">
                        
                        <label for="" class='control-label'>Name</label>
                        <div class="controls">
                            <input type="text" name='name' class='span8'  value="{{$user->name}}">
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                       
                       

                        <label for="" class='control-label'>Password</label>
                        <div class="controls">
                            <input type="text" name='password' class='span8'  value="{{$user->visible_password}}">
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>

                        <label for="" class='control-label'>Occupation</label>
                        <div class="controls">
                            <input type="text" name='occupation' class='span8'  value="{{$user->occupation}}">
                            @error('occupation')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>

                        <label for="" class='control-label'>Address</label>
                        <div class="controls">
                            <input type="text" name='address' class='span8'  value="{{$user->address}}">
                            @error('address')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>

                        <label for="" class='control-label'>Phone</label>
                        <div class="controls">
                            <input type="text" name='phone' class='span8'  value="{{$user->phone}}">
                            @error('phone')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>

                      


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