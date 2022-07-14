<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Http\Services\BookCategoryService;
use App\Http\Services\BookService;
use App\Models\Favourite;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{

    protected $postService;
    protected $categoryService;
    protected $postCategoryService;

    public function __construct(BookService $bookService, CategoryService $categoryService, BookCategoryService $bookCategoryService)
    {
        $this->postService = $bookService;
        $this->categoryService = $categoryService;
        $this->postCategoryService = $bookCategoryService;
    }
    public function index()
    {
        return view("pages.posts.index", ["result" => Book::all()]);
    }

    public function create()
    {
        return view("pages.posts.create", ["categories" => $this->categoryService->getAll()]);
    }

    public function removeFromFav(Request $request)
    {
        try {
            $this->postService->removeFromFav($request);
        } catch (ValidationException $e){

            $messages = [];
            foreach ($e->errors() as $error){

                for($i=0; $i < count($error); $i++){
                    array_push($messages, $error[$i]);
                }
            }
            return response()->json([
                'status' => false,
                'message' => $messages,
            ], 400);
        }
        return response()->json([
            'status' => true,
            'message' => 'Book has been removed from favourites',
        ], 200);
    }

    public function addToFav(Request $request)
    {
        try {
           $this->postService->addToFav($request);
        } catch (ValidationException $e){

            $messages = [];
            foreach ($e->errors() as $error){

                for($i=0; $i < count($error); $i++){
                    array_push($messages, $error[$i]);
                }
            }
            return response()->json([
                'status' => false,
                'message' => $messages,
            ], 400);
        }
        return response()->json([
            'status' => true,
            'message' => 'Book has been added to favourites',
        ], 200);

    }

    public function show($post_id)
    {
        Book::where("id", $post_id)->first()->increment("views", 1);
        $post = $this->postService->getPostById($post_id);
        $popular = $this->postService->getPopular(5);
        $isFav = null;
        if(Auth::user())
        {
            $isFav = Favourite::select('*')->where("post_id", $post_id)
                ->where("user_id", Auth::user()->id)->first();
            $popular = $this->postService->getRecomendations(Auth::user());
        }
        if (empty($popular))
        {
            $popular = $this->postService->getPopular(5);
        }

        return view("pages.single")
            ->with("currentPost", $post)
            ->with("popular", $popular)
            ->with("isFav", $isFav);
    }

    public function edit($id)
    {
        return view("pages.posts.edit", ["result" => $this->postService->getPostById($id)]);
    }

    public function store(Request $request)
    {

        try {
            $this->postService->save($request);
        }catch (\Exception $e){
            return redirect(route("posts.create"))->withErrors([
                "formMessage" => $e->getMessage()
            ]);
        }
        return redirect(route("posts"))->withSuccess("New post have been created");

    }

    public function update(Request $request, $post_id)
    {
        try {
            $this->postService->update($request, $post_id);
        } catch (\Exception $e){

            return redirect(route("posts.edit", $post_id))->withErrors([
                dd($e)
            ]);
        }
        return redirect(route("posts"))->withSuccess("Book $post_id have been edited");
    }

    public function delete($post_id)
    {
        try {
            $this->postService->delete($post_id);
        } catch (\Exception $e){
            return redirect(route("posts"))->withErrors([
                "formMessage" => "An error occurred"
            ]);
        }
        return redirect()->back()->withSuccess("Book $post_id have been deleted");
    }
}
