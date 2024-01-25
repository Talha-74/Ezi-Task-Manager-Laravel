<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
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
        // dd('Before gate check');
         
            $task_id = $request->input('task_id');
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string|max:255',
                'status' => 'required|in:To Do,In Progress,Completed',
            ]);

            $task = Task::find($task_id);
            $task->title = $request->title;
            $task->description = $request->description;
            $task->status = $request->status; // Update the status
            $task->update();

                $admin = User::whereHas('roles', function ($query) {
                $query->where('name', 'Admin');
                })->get();

                Notification::send($admin, new TaskUpdated());                                                                                                                                                                                                                                                                                                                 

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
