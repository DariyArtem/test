<?php

namespace App\Http\Controllers;

use App\Helpers\DateFormatHelper;
use App\Http\Services\CategoryService;
use App\Http\Services\BookService;
use App\Http\Services\UserService;

class PagesController extends Controller
{
    /**
     * @var CategoryService
     */
    private $categoryService;
    /**
     * @var BookService
     */
    private $postService;
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(CategoryService $categoryService, BookService $postService, UserService $userService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
        $this->userService = $userService;
    }

    public function homePage()
    {

        $featured = $this->postService->getFeatured();

        return view('pages.home')
            ->with('categories', $this->categoryService->getAll())
            ->with('featuredPosts', $featured);
    }

    public function authorPage($author){

        $popular = $this->postService->getPopularByAuthor($author);

        return view("pages.author")
            ->with('author', $author)
            ->with('categories', $this->categoryService->getAll())
            ->with('popular', $popular);

    }


}
