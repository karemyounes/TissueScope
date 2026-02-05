<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;

class UserController extends Controller
{
    public function index() {
        $users = User::get();

        return $users ; 
    }

    public function show($id) {
        $user = User::find($id) ;

        return $user ;
    }

    public function create() {

        return view('Users.CreateUser');

    }

    public function store(CreateUserRequest $request) {
        $req = $request->validated();

        User::create([
            'name'          => $req['name'],
            'email'         => $req['email'],
            'password'      => bcrypt($req['password']),
        ]);

        return redirect('/loginPage') ;
    } 

    public function edit() {

    }

    public function update() {

    }

    public function delete($id) {
        $user = User::find($id);

        $user -> delete() ;
    }
}
