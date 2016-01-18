<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    /**
     * The post repository instance.
     *
     * @var PostRepository
     */
    protected $posts;

    /**
     * Create a new PostController instance.
     *
     * @param  PostRepository  $posts
     * @return void
     */
    public function __construct(PostRepository $posts)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

	$this->posts = $posts;
    }

    /**
     * Display a list of all of the posts.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
	return view('posts.index', [
            'posts' => $this->posts->allPosts(),
	    'categories' => $this->posts->allCategories(),
        ]);
    }

    /**
     * Show the given post.
     *
     * @param  Request  $request
     * @param  string  $postId
     * @return Response
     */
    public function show(Request $request, $postId)
    {
        return view('posts.show', [
            'post' => $this->posts->postInfo($postId),
        ]);
    }


    /**
     * Create a new post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
	$this->validate($request, [
	    'title' => 'required|max:255',
	    'content' => 'required',
	]);

	$request->user()->posts()->create([
            'title' => $request->title,
	    'content' => $request->content,
	    'category_id' => $request->category_id,
	]);

	return redirect('/posts');
    }

    /**
     * Destroy the given post.
     *
     * @param  Request  $request
     * @param  string  $postId
     * @return Response
     */
    public function destroy(Request $request, $postId)
    {
	$post = Post::find($postId);
	$this->authorize('destroy', $post);
	$post->destroy($postId);

	return redirect('/posts');
    }
}
