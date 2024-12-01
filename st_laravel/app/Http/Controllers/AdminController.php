<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $todos = \App\Models\Todo::with('user')->get();
        return view('admin.dashboard', compact('todos'));
    }


    // Display List of Tasks
    public function destroyTodo($id)
    {
        $todo = \App\Models\Todo::findOrFail($id);
        $todo->delete();

        return redirect()->back()->with('success', 'Task deleted successfully by admin.');
    }


    // Edit Task Form
    public function editTask(Task $task)
    {
        return view('admin.tasks.edit', compact('task'));
    }

    // Update Task
    public function updateTask(Request $request, Task $task)
    {
        // Validate and update the task
        $task->update($request->all());
        return redirect()->route('admin.tasks')->with('success', 'Task updated successfully!');
    }

    // Delete Task
    public function deleteTask(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.tasks')->with('success', 'Task deleted successfully!');
    }
}
