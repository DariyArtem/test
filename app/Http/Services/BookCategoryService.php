<?php


namespace App\Http\Services;


use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\PostCategoryRepository;
use App\Http\Repositories\PostRepository;
use App\Models\Book;

class BookCategoryService
{
    protected $postCategoryRepository;
    protected $postRepository;
    protected $categoryRepository;

    public function __construct(
        PostCategoryRepository $postCategoryRepository,
        PostRepository $postRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->postCategoryRepository = $postCategoryRepository;
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getPostCategoryByCategoryId($id)
    {
        return $this->postCategoryRepository->getPostCategoryByCategoryId($id);
    }

    public function getPostsFromPostCategory($id)
    {
        return $this->getPostCategoryByCategoryId($id);
    }

}
