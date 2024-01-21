<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:255',
        ]);


        $task = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        Task::create($task);
        return redirect()->route('task.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $task_id = $request->input('task_id');
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:255',
        ]);

        $task = Task::find($task_id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->update();

        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $destroy = Task::find($id);
        $destroy->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
    }
}
