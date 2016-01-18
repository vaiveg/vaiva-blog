<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * The category repository instance.
     *
     * @var CategoryRepository
     */
    protected $categories;

    /**
     * Create a new CategryController instance.
     *
     * @param CategoryRepository $categories
     * @return void
     */
    public function __construct(CategoryRepository $categories)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    
	$this->categories = $categories;
    }

    /**
     * Display a list of all of the categories.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('categories.index', [
            'categories' => $this->categories->allCategories(),
        ]);
    }

    /**
     * Show posts of the given category.
     *
     * @param  Request  $request
     * @param  string  $categoryId
     * @return Response
     */
    public function show(Request $request, $categoryId)
    {
        return view('categories.show', [
	    'category' => $this->categories->categoryInfo($categoryId),
            'posts' => $this->categories->categoryPosts($categoryId),
        ]);
    }

    /**
     * Create a new category.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $category = new Category;
	$category->title = $request->title;
	$category->save();

        return redirect('/categories');
    }

    /**
     * Destroy the given category.
     *
     * @param  Request  $request
     * @param  string  $categoryId
     * @return Response
     */
    public function destroy(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);
        $this->authorize('destroy', $category);
        $category->destroy($categoryId);

        return redirect('/categories');
    }
}
