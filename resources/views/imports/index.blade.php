@extends('layouts.app')

@section('content')
    @if(session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    <h1>Import Posts</h1>
    <hr>
    <div class="row justify-content-center mt-5 mb-2">
        <h2>An automatic import is made every 2 hours</h2>
    </div>

    <div class="row justify-content-center mt-2">
        <p>
            You can force a manual import with the following button
        </p>

    </div>
    <div class="row justify-content-center mt-2">
        <form method="POST" action="{{ route('imports.store') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Manual Import</button>
        </form>
    </div>
@endsection

@section('footer')
@endsection
