<?php

namespace App\Http\Controllers;

use App\Helpers\DateFormatHelper;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Services\CategoryService;
use App\Http\Services\BookCategoryService;
use App\Http\Services\BookService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryService;
    protected $postService;
    protected $postCategoryService;

    public function __construct(CategoryService $categoryService, BookService $postService, BookCategoryService $postCategoryService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
        $this->postCategoryService = $postCategoryService;
    }

    public function index()
    {
        return view("Admin.pages.categories.index", ["result" => $this->categoryService->getAll()]);
    }

    public function create()
    {
        return view("Admin.pages.categories.create");
    }

    public function showOne($id)
    {
        $popular = $this->postService->getPopular(5);
        $posts = $this->postCategoryService->getPostsFromPostCategory($id);
        $datesOfPosts = $this->postService->getDatesOfPosts($posts);
        $datesOfPopularPosts = $this->postService->getDatesOfPosts($popular);

        return view("pages.category")
            ->with("books", $posts)
            ->with("popular", $popular)
            ->with("datesOfPopularPosts", $datesOfPopularPosts)
            ->with("datesOfPosts", $datesOfPosts)
            ->with("categories", $this->categoryService->getAll())
            ->with("category", $this->categoryService->getCategoryById($id));
    }


    public function paginate($items, $perPage = 4, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $offset = ($page * $perPage) - $perPage ;
        $itemsToShow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemsToShow ,$total ,$perPage);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            "name",
            "image",
        ]);

        try {
            $this->categoryService->save($data);
        } catch (\Exception $e){
            return redirect(route("auth.admin.categories.create"))->withErrors([
                "formError" => "An error occurred"
            ]);
        }

        return redirect(route("auth.admin.categories"))->withSuccess("New category have been created");
    }

    public function edit($id)
    {
        return view("Admin.pages.categories.edit", ["category" => $this->categoryService->getCategoryById($id)]);
    }

    public function update(Request $request, $category_id)
    {

        try {
            $this->categoryService->edit($request, $category_id);
        } catch (\Exception $e){
            return redirect(route("auth.admin.categories.edit", $category_id))->withErrors([
                "formError" => "An error occurred"
            ]);
        }

        return redirect(route("auth.admin.categories"))->withSuccess("Category $category_id have been updated");

    }
}
