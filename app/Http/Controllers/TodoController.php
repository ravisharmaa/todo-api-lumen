<?php

namespace App\Http\Controllers;
use App\Todo;
use App\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index($id=null)
    {
        if(!$id){
           return !empty(Todo::all())? Todo::all():$this->baseResponse(true, 'Data not Available');
        }

        try { 
            $user = User::findOrfail($id);
            return $user->todos;
        } catch(\Exception $e){
            return $this->baseResponse(false, 'No Such User Not Found');
        }

    }

    public function store($id, Request $request)
    {
        try{
            $user = User::findOrfail($id);
            return $user->addTodo([
                'user_id'   =>  $user->id,
                'title'     =>  $request->get('title'),
                'completed' =>  $request->get('completed')
            ]);

        }catch (\Exception $e){
            return $this->baseResponse(false, 'Requirements not fulfilled');
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
