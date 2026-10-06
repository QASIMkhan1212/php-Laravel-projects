@extends('layouts.app')

@section('title', 'Contact Book')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Contact Book</h1>
        <a href="{{ route('contacts.create') }}" class="btn btn-primary">+ Add Contact</a>
    </div>

    <form method="GET" class="row g-2 mb-3">
    <div class="col-md-6"><input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search by name, phone or email..."></div>
    <div class="col-auto"><button class="btn btn-outline-primary">Search</button> <a href="{{ route('contacts.index') }}" class="btn btn-link">Reset</a></div>
</form>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Name</th><th>Phone</th><th>Email</th><th class="text-end">Actions</th></tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email ?? '—' }}</td>
                        <td class="text-end text-nowrap">
                            
                            <a href="{{ route('contacts.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('contacts.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?')">
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
