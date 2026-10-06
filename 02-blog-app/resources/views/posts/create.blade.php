@extends('layouts.app')

@section('title', 'Add Post')

@section('content')
    <h1 class="h3 mb-3">Add Post</h1>

    <form method="POST" action="{{ route('posts.store') }}" class="card card-body">
        @csrf
        
        @include('posts._form', ['item' => null])
        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('posts.index') }}" class="btn btn-link">Cancel</a>
        </div>
    </form>
@endsection
