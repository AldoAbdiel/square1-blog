@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <h1>{{ Auth::user()->name }} - Posts</h1>

    <hr/>

    @if(count($posts) > 0)
        <div class="card">
            <div class="card-body" name="posts-dtable">
                <table class="table table-striped" id="posts">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Publication Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h4>There are no posts, please create some!</h4>
    @endif

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#posts').DataTable();
        });
    </script>
@endsection

@section('footer')
@endsection
