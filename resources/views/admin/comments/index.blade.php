@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Comments</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Loop through each blog with its comments -->
    @foreach($blogs as $blog)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">{{ $blog->title_en }}</h5>
            </div>
            <div class="card-body">
                <!-- Display comments for the current blog -->
                @if($blog->comments->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blog->comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>
                                        <!-- Trigger Modal Button -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $comment->id }}">
                                            Delete
                                        </button>

                                        <!-- Delete Confirmation Modal -->
                                        <div class="modal fade" id="deleteModal{{ $comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{ $comment->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $comment->id }}">Confirm Deletion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this comment?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- Form for Deletion -->
                                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No comments available for this blog.</p>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
