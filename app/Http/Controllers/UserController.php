<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();

        return view('user.index', ['user' => $user]); 
    }

    public function store(Request $request)
    {   
        // dd($request);
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'confirm_password' => $request->confirm_password,
            'level' => $request->level,
            'email' => $request->email,
            'name' => $request->name,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);
        return redirect('/user')->with(['success' => 'Data User Berhasil Ditambahkan!']);
    }

    public function show(User $user)
    {
        // $model = User::findOrFail($id);
        // return view('user.show',compact('model'));
        return view('user/show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]); 
    }
    
    public function update(Request $request, User $user)
    {
        User::where('id', $user->id)
            ->update([
                'username' => $request->username,
                'password' => $request->password,
                'confirm_password' => $request->confirm_password,
                'level' => $request->level,
                'email' => $request->email,
                'name' => $request->name,
                'keterangan' => $request->keterangan,
                'status' => $request->status
            ]);
            return redirect('/user')->with(['success' => 'Data User Berhasil Diubah!']);
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with(['success' => 'Data User Berhasil Dihapus!']);
    }
}
