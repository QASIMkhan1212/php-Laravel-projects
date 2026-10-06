@extends('layouts.app')

@section('title', 'Edit Expense')

@section('content')
    <h1 class="h3 mb-3">Edit Expense</h1>

    <form method="POST" action="{{ route('expenses.update', $item) }}" class="card card-body">
        @csrf
        @method('PUT')
        @include('expenses._form', ['item' => $item])
        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('expenses.index') }}" class="btn btn-link">Cancel</a>
        </div>
    </form>
@endsection
