<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       return !empty(User::all())? User::all(): response([
            'success'=>true,
            'message'=>'Data not available'
       ], 200);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return $user;
    }

    public function show($id)
    {
        return User::findOrfail($id);
    }
}
