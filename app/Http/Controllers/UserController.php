<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Redirect;

use App\User;
use App\Roles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', [ 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles            = Roles::all();
        return view('users.create', [ 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user       = new User();
        
        $first_name = $request->first_name;
        $last_name  = $request->last_name;
        $email      = $request->email;
        $password   = bcrypt($request->password);
        $bio        = $request->bio;
        $role_id    = $request->role;

        $user->first_name = $first_name;
        $user->last_name  = $last_name;
        $user->email      = $email;
        $user->password   = $password;
        $user->role_id    = $role_id;
        $user->bio        = $bio;
        $user->save();

        return Redirect::to('users')->with('message', 'New User added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user  = User::find($id);
        $roles = Roles::all();
        return view('users.show', [ 'roles' => $roles , 'user' => $user ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::find($id);
        $roles = Roles::all();
        return view('users.edit', [ 'roles' => $roles , 'user' => $user ]);
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
        $user       = User::find($id);
        
        $first_name = $request->first_name;
        $last_name  = $request->last_name;
        $email      = $request->email;

        if($request->password)
            $password   = bcrypt($request->password);

        $bio        = $request->bio;
        $role_id    = $request->role;

        $user->first_name = $first_name;
        $user->last_name  = $last_name;
        $user->email      = $email;

        if($request->password)
            $user->password   = $password;

        $user->role_id    = $role_id;
        $user->bio        = $bio;
        $user->save();

        return Redirect::to('users')->with('message', 'User updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return Redirect::to('users')->with('message', 'User deleted!');
    }
}
