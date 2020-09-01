<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'status' => 'required'
        ]);

        if($request->input('password'))
        {
            $password = bcrypt($request->password);
        
        }else{
           $password = bcrypt('1234');
           
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => $password
        ]);

        return redirect()->back()->with('message','User berhasil dibuat');
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
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
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
        $request->validate([
            'name' => 'required|min:3|max:100',
            'status' => 'required'
        ]);

        if($request->input('password')){
            $user_data = [
            'name' => $request->name,
            'status' => $request->status,
            'password' => bcrypt($request->password)
        ];
        }else{
            $user_data = [
                'name' => $request->name,
                'status' => $request->status
        ];
        }

        $user = User::find($id);
        $user->update($user_data);

        return redirect()->route('user.index')->with('message','User Berhasil di Edit');



        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->back()->with('message' , 'User berhasil Dihapus');
    }
}
