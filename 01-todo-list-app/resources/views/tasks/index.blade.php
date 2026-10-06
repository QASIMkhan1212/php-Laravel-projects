@extends('layouts.app')

@section('title', 'Todo List App')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Todo List App</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Add Task</a>
    </div>

    <form method="GET" class="row g-2 mb-3">
    <div class="col-auto">
        <select name="status" class="form-select" onchange="this.form.submit()">
            <option value="">All tasks</option>
            <option value="pending" @selected(request('status') === 'pending')>Pending</option>
            <option value="done" @selected(request('status') === 'done')>Completed</option>
        </select>
    </div>
</form>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Title</th><th>Due</th><th>Status</th><th class="text-end">Actions</th></tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr>
                        <td><span @class(['text-decoration-line-through text-muted' => $item->is_completed])>{{ $item->title }}</span></td>
                        <td>{{ $item->due_date?->format('d M Y') ?? '—' }}</td>
                        <td><span class="badge {{ $item->is_completed ? 'bg-success' : 'bg-warning text-dark' }}">{{ $item->is_completed ? 'Done' : 'Pending' }}</span></td>
                        <td class="text-end text-nowrap">
                            <form action="{{ route('tasks.toggle', $item) }}" method="POST" class="d-inline">@csrf @method('PATCH')<button class="btn btn-sm btn-outline-success">{{ $item->is_completed ? 'Undo' : 'Done' }}</button></form>
                            <a href="{{ route('tasks.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('tasks.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">Nothing here yet. Add your first one!</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $items->links() }}</div>
@endsection
