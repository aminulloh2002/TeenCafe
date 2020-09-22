<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
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
        $users = User::OrderBy('id','desc')->where('role','kasir')->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
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
            'name'   => ['required'],
            'username'         => ['required','min:6'],
            'password'         => ['required','min:8'],
        ]);    

        User::create([
    		'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'kasir',
    	]);
        return redirect()->route('user.index')->with('status','Data User Berhasil Ditambahakan');
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
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'   => ['required'],
            'username'         => ['required','min:6'],
        ]);
        if($request->new_password != ""){
            
             $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->new_password),
                'role' => 'kasir',
            ]);
            return redirect()->route('user.index')->with('status','Data User Berhasil DiEdit');

        }else{
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => $request->password,
                'role' => 'kasir',
            ]);
            return redirect()->route('user.index')->with('status','Data User Berhasil DiEdit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('status','Data User Berhasil Dihapus');
    }
}
