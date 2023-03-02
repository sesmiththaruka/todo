<?php

namespace App\Http\Controllers;

use App\Models\Tode;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    protected $task;
    public function __construct()
    {
        $this->task = new Tode();
    }


    public function index()
    {

        $response['tasks'] = $this->task->all();

        return view('pages.todo.todo')->with($response);
    }

    public function save(Request $request)
    {
        //   dd($request);

        $this->task->create($request->all());
        return redirect()->back();
    }

    public function delete($task_id)
    {

        $task = $this->task->find($task_id);
        $task->delete();

        return redirect()->back();
    }

    public function update($task_id)
    {
        $task = $this->task->find($task_id);
        if ($task->done == 0) {
            $task->done = 1;
            $task->update();
        } else {
            $task->done = 1;
            $task->update();
        }
    }
}
