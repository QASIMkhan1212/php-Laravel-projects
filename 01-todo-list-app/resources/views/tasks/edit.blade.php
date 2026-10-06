@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <h1 class="h3 mb-3">Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $item) }}" class="card card-body">
        @csrf
        @method('PUT')
        @include('tasks._form', ['item' => $item])
        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-link">Cancel</a>
        </div>
    </form>
@endsection
