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
        return User::create($request->all());
    }

    public function show($id)
    {
        try{
            return User::findOrfail($id);
        } catch(\Exception $e){
            return $this->baseResponse(false, 'Invalid Parameters');
        }
    }
}
