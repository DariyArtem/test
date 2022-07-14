<?php


namespace App\Http\Repositories;


use App\Models\Book;
use App\Models\PostCategory;

class PostCategoryRepository
{
    protected $postCategory;
    protected $post;

    public function __construct(PostCategory $postCategory, Book $post)
    {
        $this->postCategory = $postCategory;
        $this->post = $post;
    }

    public function getPostCategoryByCategoryId($id)
    {
        return $this->post::where("category_id", $id)->paginate(4);
    }

    public function getSimilarPostsByCategoryId($id)
    {
        return $this->postCategory::where("category_id", $id)->inRandomOrder()->limit(3)->get();
    }

}
