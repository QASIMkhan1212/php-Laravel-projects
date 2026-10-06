@extends('layouts.app')

@section('title', 'Edit Contact')

@section('content')
    <h1 class="h3 mb-3">Edit Contact</h1>

    <form method="POST" action="{{ route('contacts.update', $item) }}" class="card card-body">
        @csrf
        @method('PUT')
        @include('contacts._form', ['item' => $item])
        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-link">Cancel</a>
        </div>
    </form>
@endsection
