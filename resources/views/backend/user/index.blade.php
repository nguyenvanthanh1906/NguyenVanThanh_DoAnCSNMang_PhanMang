@extends('backend.layouts.master')

@section('title','get all quiz')
@section('content')

<div class="span9">
    <div class="content">
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="module">

  <h2>Tất cả User</h2>
        
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Occupation</th>
        <th>Address</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
        @if(count($users)>0)
        @foreach($users as $key=>$user)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->visible_password}}</td>
        <td>{{$user->occupation}}</td>
        <td>{{$user->address}}</td>
        <td>{{$user->phone}}</td>
        
       
        <td>
            <a href="{{route('user.edit',[$user->id])}}"><button class="btn btn-primary">Edit</button></a>
        </td>
        <td>
            <form action="{{route('user.destroy',[$user->id])}}" id="delete-form{{$user->id}}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="
                if(confirm('Bạn có chắc chắn xóa không?')){
                event.preventDefault();
                document.getElementById('delete-form{{$user->id}}').submit();
                }else {event.preventDefault();}
            
                 " >Delete</button>
            </form>
           
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
 
</div>
</div>
</div>

@endsection

