@extends('layouts.app')

@section('title', $item->title)

@section('content')
    <a href="{{ route('posts.index') }}" class="btn btn-link px-0 mb-2">&larr; Back to posts</a>
    <article class="card card-body">
        <h1 class="h3">{{ $item->title }}</h1>
        <p class="text-muted">By {{ $item->author }} &middot; {{ $item->created_at->format('d M Y') }}</p>
        <div style="white-space: pre-line">{{ $item->body }}</div>
    </article>
@endsection
