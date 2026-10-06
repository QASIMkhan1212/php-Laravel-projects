@extends('layouts.app')

@section('title', 'Expense Tracker')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Expense Tracker</h1>
        <a href="{{ route('expenses.create') }}" class="btn btn-primary">+ Add Expense</a>
    </div>

    <form method="GET" class="row g-2 mb-3 align-items-center">
    <div class="col-auto">
        <select name="category" class="form-select" onchange="this.form.submit()">
            <option value="">All categories</option>
            @foreach($categories as $c)
                <option value="{{ $c }}" @selected(request('category') === $c)>{{ $c }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-auto"><div class="alert alert-info py-2 mb-0">Total: <strong>{{ number_format($total, 2) }}</strong></div></div>
</form>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Title</th><th>Category</th><th>Date</th><th>Amount</th><th class="text-end">Actions</th></tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td><span class="badge bg-secondary">{{ $item->category }}</span></td>
                        <td>{{ $item->spent_on->format('d M Y') }}</td>
                        <td>{{ number_format($item->amount, 2) }}</td>
                        <td class="text-end text-nowrap">
                            
                            <a href="{{ route('expenses.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('expenses.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Nothing here yet. Add your first one!</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $items->links() }}</div>
@endsection
