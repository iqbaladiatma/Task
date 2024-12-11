<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::query()
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        // Return JSON jika request dari API
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Task berhasil diambil',
                'data' => $tasks
            ]);
        }

        return view('tasks.todo', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = Task::create($validated);

        // Return JSON jika request dari API
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Task berhasil ditambahkan',
                'data' => $task
            ], 201);
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task berhasil ditambahkan');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->update($validated);

        // Return JSON jika request dari API
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Task berhasil diupdate',
                'data' => $task
            ]);
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task berhasil diupdate');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        // Return JSON jika request dari API
        if (request()->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Task berhasil dihapus'
            ]);
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task berhasil dihapus');
    }
}
