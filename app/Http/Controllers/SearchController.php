<?php

namespace App\Http\Controllers;

use App\Helpers\DateFormatHelper;
use App\Http\Services\BookService;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    protected $postService;

    public function __construct(BookService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        $validatedField = $this->postService->validationOfQuery($request);
        $popular = $this->postService->getPopular(5);
        $posts =  $this->postService->searchByQuery($validatedField["title"]);
        $datesOfPopularPosts = [];
        $datesOfPosts = [];

        for ($i=0; $i<count($popular); $i++){
            array_push($datesOfPopularPosts, DateFormatHelper::index($popular[$i]->created_at));
        }
        for ($i=0; $i<count($posts); $i++){
            array_push($datesOfPosts, DateFormatHelper::index($posts[$i]->created_at));
        }

        return view("pages.search")
            ->with('query', $validatedField["title"])
            ->with("posts", $posts)
            ->with("popular", $this->postService->getPopular(5))
            ->with("datesOfPopularPosts", $datesOfPopularPosts)
            ->with("datesOfPosts", $datesOfPosts);
    }
}
