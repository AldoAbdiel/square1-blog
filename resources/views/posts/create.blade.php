@extends('layouts.app')

@section('content')
    @if(session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif

    <h1>Create Post</h1>
    <hr/>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" placeholder="Simple title post..." id="title" name="title" required autocomplete="title" autofocus>
            <br>
            <label for="description">Description</label>
            <textarea class="form-control" rows="4" id="description" name="description" required autocomplete="description" autofocus></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('footer')
@endsection
