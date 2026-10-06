@extends('layouts.app')

@section('title', 'Add Contact')

@section('content')
    <h1 class="h3 mb-3">Add Contact</h1>

    <form method="POST" action="{{ route('contacts.store') }}" class="card card-body">
        @csrf
        
        @include('contacts._form', ['item' => null])
        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-link">Cancel</a>
        </div>
    </form>
@endsection
