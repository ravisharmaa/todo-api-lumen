<?php

namespace App\Http\Controllers;
use App\Todo;
use App\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
      return Todo::all();
    }

    public function store($id, Request $request)
    {
        return User::findOrfail($id)
        ->addTodo([
                'title'     =>  $request->get('title'),
                'completed' =>  $request->get('completed')
        ]);
    }

    public function show($id)
    {
        return User::findOrfail($id)->todos;
    }

    public function update($id, Request $request)
    {
        Todo::findOrfail($id)->update($request->all());
        return $this->baseResponse(true, 'Resource Successfully Updated');
    }

    public function destroy($id)
    {
         Todo::findOrfail($id)->delete();
         return $this->baseResponse(true, 'Request Successfully Deleted');
    }
}
