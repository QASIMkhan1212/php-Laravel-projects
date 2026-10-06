@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="h3 mb-3">Edit Post</h1>

    <form method="POST" action="{{ route('posts.update', $item) }}" class="card card-body">
        @csrf
        @method('PUT')
        @include('posts._form', ['item' => $item])
        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('posts.index') }}" class="btn btn-link">Cancel</a>
        </div>
    </form>
@endsection
