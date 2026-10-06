@extends('layouts.app')

@section('title', 'Add Expense')

@section('content')
    <h1 class="h3 mb-3">Add Expense</h1>

    <form method="POST" action="{{ route('expenses.store') }}" class="card card-body">
        @csrf
        
        @include('expenses._form', ['item' => null])
        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('expenses.index') }}" class="btn btn-link">Cancel</a>
        </div>
    </form>
@endsection
