<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $query = Todo::where('user_id', auth()->id())
            ->where('is_completed', 0);

        if ($request->search) {
            $query->where('task', 'like', '%'.$request->search.'%');
        }

        $todos = $query->latest()->paginate(10);

        return view('tasks.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|min:3|max:255'
        ]);

        Todo::create([
            'task' => $request->task,
            'user_id' => auth()->id(),
            'is_completed' => 0
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task ditambahkan');
    }

    public function show($id)
    {
        $todo = Todo::where('user_id', auth()->id())->findOrFail($id);

        return view('tasks.show', compact('todo'));
    }

    public function edit($id)
    {
        $todo = Todo::where('user_id', auth()->id())->findOrFail($id);

        return view('tasks.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|string|min:3|max:255'
        ]);

        $todo = Todo::where('user_id', auth()->id())->findOrFail($id);

        $todo->update([
            'task' => $request->task
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task diupdate');
    }

    public function history()
    {
        $todos = Todo::where('user_id', auth()->id())
            ->where('is_completed', 1)
            ->latest()
            ->get();

        return view('tasks.history', compact('todos'));
    }

    public function toggle($id)
    {
        $todo = Todo::where('user_id', auth()->id())->findOrFail($id);

        $todo->update([
            'is_completed' => !$todo->is_completed
        ]);

        return back();
    }

    public function destroy($id)
    {
        Todo::where('user_id', auth()->id())->findOrFail($id)->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task dihapus');
    }
}