@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <h1 class="h3 mb-3">Add Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}" class="card card-body">
        @csrf
        
        @include('tasks._form', ['item' => null])
        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-link">Cancel</a>
        </div>
    </form>
@endsection
