@extends('layouts.design')

@section('title', $blog->title_en)

@section('content')
<div class="container-fluid px-5 ps-5 pe-5 pt-5">
    <div class="row">
        <div class="col-md-8 p-2">
            <div class="mb-4">
                <img src="{{ asset($blog->image) }}" class="card-img-top img-fluid" style="height: 300px; object-fit: cover;" alt="{{ $blog->title_en }}">
            </div>
            <h1 class="text-light-green">{{ $blog->title_en }}</h1>
            <p class="text-muted">{{ $blog->created_at->format('F j, Y, g:i a') }}</p>
            <div>
                {!! $blog->description_en !!}
            </div>

            <div class="mt-5">
                <h3>Comments</h3>
                @foreach($comments as $comment)
                    <div class="comment mb-3 p-3 border-bottom">
                        <p><strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at->format('F j, Y, g:i a') }}</p>
                        <p>{{ $comment->content }}</p>

                        @if (Auth::check() && Auth::id() === $comment->user_id)
                            <!-- Edit Button -->
                            <button type="button" class="btn btn-light-green btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editCommentModal{{ $comment->id }}">Edit</button>

                            <!-- Delete Button -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCommentModal{{ $comment->id }}">Delete</button>

                            <!-- Edit Comment Modal -->
                            <div class="modal fade" id="editCommentModal{{ $comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCommentModalLabel{{ $comment->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCommentModalLabel{{ $comment->id }}">Edit Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('blogs_update_comment', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <textarea name="content" class="form-control" rows="4" required>{{ $comment->content }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-3">Update Comment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Comment Modal -->
                            <div class="modal fade" id="deleteCommentModal{{ $comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteCommentModalLabel{{ $comment->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteCommentModalLabel{{ $comment->id }}">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this comment?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('blogs_destroy_comment', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            @auth
                <div class="mt-5">
                    <h3>Add a Comment</h3>
                    <form action="{{ route('blogs_store_comment', $blog->slug) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="4" placeholder="Enter your comment here" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
                    </form>
                </div>
            @else
                <p class="mt-4 text-dark-green">Please <a href="{{ route('login') }}" class="text-dark-green">log in</a> to leave a comment.</p>
            @endauth

        </div>

        <div class="col-md-1 d-none d-md-flex justify-content-center align-items-center">
            <hr class="vertical-divider" style="height: 100%; width: 1px;">
        </div>

        <div class="col-md-3">
            <h3 class="text-dark-green">Check Out Our Other Blogs!</h3>
            <ul class="list-unstyled">
                @foreach ($otherBlogs as $otherBlog)
                    <li class="no-decor">
                        <a href="{{ route('blogs_show', $otherBlog->slug) }}" class="no-decor"><h5 class="text-dark">{{ $otherBlog->title_en }}</h5></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
