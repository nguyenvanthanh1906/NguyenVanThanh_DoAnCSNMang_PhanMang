<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=(new User)->allUsers();
        return view('backend.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'occupation'=>'required',
            'address'=>'required',
            'phone'=>'required'
        ]);
        $user=(new User)->storeUser($request->all());
        return redirect()->back()->with('message','Tao user thanh cong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=(new User)->findUserById($id);
        return view('backend.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            
            'password'=>'required|min:6',
            'occupation'=>'required',
            'address'=>'required',
            'phone'=>'required'
        ]);
        (new User)->updateUser($request->all(),$id);
        return redirect(route('user.index'))->with('message','Update thành công');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //  if(auth()->user()->id==$id){
           // return redirect()->back('mesage','Bạn không thể xóa chính bạn');
       // }
        (new User)->deleteUser($id);
        return redirect(route('user.index'))->with('message','Xóa user thành công');
    }

    public function validateForm($request){
        return $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'occupation'=>'required',
            'address'=>'required',
            'phone'=>'required'
        ]);
    }
}
