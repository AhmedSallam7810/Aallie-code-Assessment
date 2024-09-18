<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponser;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use ApiResponser;

     public function index(){
        $tasks=Task::all();
        $data=TaskResource::collection($tasks);
        return $this->successResponse($data,'retrieve data successfully!');
     }

     public function store(TaskRequest $request){
        $data=$request->validated();
        $task=Task::create($data);
        $data=TaskResource::make($task);
        return $this->successResponse($data,'store data successfully!');
     }

     public function update(TaskRequest $request, $id){
        $task=Task::find($id);
        if(!$task){
            return $this->notFoundResponse();
        }
        $data=$request->validated();
        $task->update($data);
        $data=TaskResource::make($task);
        return $this->successResponse($data,'update data successfully!');
     }

     public function destroy($id){
        $task=Task::find($id);
        if(!$task){
            return $this->notFoundResponse();
        }
        $task->delete();
        $data=TaskResource::make($task);
        return $this->successResponse($data,'delete data successfully!');
     }
}
