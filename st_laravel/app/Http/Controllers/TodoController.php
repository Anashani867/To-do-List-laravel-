<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = auth()->user()->todos;
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        auth()->user()->todos()->create($request->only('title', 'description'));

        return redirect()->back()->with('success', 'Task added successfully.');
    }

    public function update(Request $request, $id)
    {
        $todo = auth()->user()->todos()->findOrFail($id);
        $todo->update($request->only('title', 'description', 'status'));

        return redirect()->back()->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $todo = auth()->user()->todos()->findOrFail($id);
        $todo->delete();

        return redirect()->back()->with('success', 'Task deleted successfully.');
    }


}
