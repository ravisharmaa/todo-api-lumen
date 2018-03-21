<?php

namespace App\Http\Controllers;
use App\Todo;
use App\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return !empty(Todo::all())? Todo::all():$this->baseResponse(true, 'Data not Available');
    }

    public function store($id, Request $request)
    {
        $user = User::findOrfail($id);
        return $user->addTodo([
                'user_id'   =>  $user->id,
                'title'     =>  $request->get('title'),
                'completed' =>  $request->get('completed')
        ]);
    }

    public function show($id)
    {
        $user = User::findOrfail($id);
        return $user->todos;
    }

    public function update($id, Request $request)
    {
        $todo = Todo::findOrfail($id);
        $todo->update($request->all());;

    }

    public function destroy($id)
    {
        $todo = Todo::findOrfail($id);
        $todo->delete();
        return $this->baseResponse(true, 'Request Succesfully Completed');
    }
}
