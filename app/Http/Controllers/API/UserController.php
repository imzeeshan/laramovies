<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller as Controller;

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
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles            = Roles::all();       
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

        return 'success';
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
        return $user;
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

       return "success";

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
        return "success";
    }
}
