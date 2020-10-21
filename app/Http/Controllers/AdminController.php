<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::where('role','content-writer')->paginate(6);

        return view('admin.index',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::create([
            'name'=>$request->nama,
            'email'=>$request->email,
            'role'=>'content-writer',
            'password'=>bcrypt('password'),
        ]);

        $user->assignRole('content-writer');

        return redirect('admin');
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
        $user = User::where('role','content-writer')->paginate(6);
        $users = User::findOrFail($id);
        $name = $users->name;
        $email = $users->email;
        return view('admin.edit',['users'=>$user, 'id'=>$id, 'name'=>$name, 'email'=>$email]);
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
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $userName = User::findOrFail($id);
        $userName->name = $request->nama;
        $userName->save();

        $userEmail = User::findOrFail($id);
        $userEmail->email = $request->email;
        $userEmail->save();
        // $user->update($request->all());

        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=User::findOrFail($id);
        $tag->delete();

        return redirect('admin');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $user=User::orderBy('id','desc')
            ->where('name','like',"%".$cari."%")
            ->orWhere('email','like',"%".$cari."%")
            ->paginate(6);

        $user->appends($request->only('cari'));
        return view('admin.index',['users'=>$user]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'id'=>'required'
        ]);

        $user = User::where('id',$request->id)->first();
        $user->password = bcrypt('password');
        $user->save();
        return redirect('admin');
    }
}
