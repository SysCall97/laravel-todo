<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Create
    public function create()
    {
        return view('todos.create');
    }

    public function store(Todo $request)
    {
        Todo::create($request->all());
        return redirect(route('todos.index'));
    }

    // Read
    public function index()
    {
        $todos = Todo::orderby('completed')->get();
        return view('todos.index', compact('todos'));
    }

    // Update
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function completed(Todo $todo)
    {
        $completed_value = $todo->completed == 1 ? false : true;
        $todo->update(['completed' => $completed_value]);
        return redirect(route('todos.index'));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update(['title' => $request->title]);
        return redirect(route('todos.index'));
    }

    // Delete
    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todos.index'));
    }

}
