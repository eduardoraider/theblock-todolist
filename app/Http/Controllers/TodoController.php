<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;

class TodoController extends Controller
{

    public function index() {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    public function create(Request $request) {

        $request->validate([
            'task' => 'required',
        ]);

        $todos = Todo::create($request->all());

        return redirect()->route('index')->with('success', 'Todo created successfully.');
    }

    public function update($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->update(['status' => true]);

        return redirect()->route('index')->with('success', 'Todo updated successfully.');
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('index')->with('success', 'Todo deleted successfully.');
    }

}