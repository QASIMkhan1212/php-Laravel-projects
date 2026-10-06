<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->query('status') === 'done') {
            $query->where('is_completed', true);
        } elseif ($request->query('status') === 'pending') {
            $query->where('is_completed', false);
        }

        $items = $query->orderBy('is_completed')->orderBy('due_date')->paginate(10)->withQueryString();

        return view('tasks.index', compact('items'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        Task::create($this->validated($request));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['item' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($this->validated($request, $task));

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function toggle(Task $task)
    {
        $task->update(['is_completed' => ! $task->is_completed]);

        return back()->with('success', 'Task status updated.');
    }

    private function validated(Request $request, ?Task $task = null): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'is_completed' => 'boolean',
        ]);

        $data['is_completed'] = $request->boolean('is_completed');

        return $data;
    }
}
