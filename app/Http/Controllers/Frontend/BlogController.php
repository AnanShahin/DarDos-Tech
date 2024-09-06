<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)->get();
        return view('frontend.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', 1)->firstOrFail();
        $otherBlogs = Blog::where('status', 1)->where('slug', '!=', $slug)->get();
        $comments = $blog->comments()->latest()->get();

        return view('frontend.blog.show', compact('blog', 'otherBlogs', 'comments'));
    }

    public function storeComment(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Validate and store the comment
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = Auth::id();
        $comment->blog_id = $blog->id;
        $comment->save();

        return redirect()->route('blogs_show', $slug)->with('success', 'Comment added successfully.');
    }

    public function updateComment(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update(['content' => $request->content]);

        return redirect()->route('blogs_show', $comment->blog->slug)
                         ->with('success', 'Comment updated successfully.');
    }

    public function destroyComment(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('blogs_show', $comment->blog->slug)
                         ->with('success', 'Comment deleted successfully.');
    }
}
