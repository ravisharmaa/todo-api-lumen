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
        try{
            $user = User::findOrfail($id);
            $user->addTodo([
                'title'     =>  $request->get('title'),
                'user_id'   =>  $user->id,
                'completed' =>  $request->get('completed')
            ]);

           return $user->with('todo');

        }catch (\Exception $e){
            return 'stay dummy for a while';
        }

    }

    public function update($id, Request $request)
    {
        try{
            $todo = Todo::findOrfail($id);
            $todo->update($request->all());;
            return $todo;
        }catch (\Exception $e){
            return 'stay dumpmed for a while';
        }
    }

    public function destroy($id)
    {
        try{
            $todo = Todo::findOrfail($id);
            $todo->delete();;
           return response([
               'success'=>true,
               'message'=>'Request Completed',
               'data'],
               200);
        }catch (\Exception $e){
            return 'stay dumpmed for a while';
        }
    }
}
