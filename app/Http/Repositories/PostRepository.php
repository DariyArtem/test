<?php


namespace App\Http\Repositories;


use App\Models\Favourite;
use App\Models\Book;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostRepository
{
    protected $post;
    protected $fav;

    public function __construct(Book $post, Favourite $fav)
    {
        $this->fav = $fav;
        $this->post = $post;
    }
    public function removeFromFav($request)
    {
        return Favourite::select("*")->where('post_id',$request->post_id)
            ->where('user_id', $request->user_id)->first()->delete();
    }

    public function addToFav($validated)
    {
        return $this->fav::create($validated);
    }

    public function getRecomendations($user)
    {
        return $this->post::where('category_id', $this->post::find(154)->category_id)
            ->inRandomOrder()->limit(4)->get();
       // return $user;
    }

    public function getFeatured()
    {
        return $this->post::orderBy("views", "desc")->limit(15)->get();
    }

    public function getLatestPosts($count)
    {
        return $this->post::orderBy("created_at", "desc")->paginate($count);
    }

    public function getSimilarPostsByCategoryId($post_id)
    {
        return $this->post::where(
            'category_id', $this->post::find($post_id)->category_id)
            ->inRandomOrder()->limit(4)->get();
    }

    public function getLatestPostsByAuthorId($id)
    {
        return $this->post::where("author_id", $id)->orderBy("created_at", "desc")->paginate(4);
    }

    public function searchByQuery($validatedField)
    {
        return $this->post::where("title", "LIKE", "%{$validatedField}%")->paginate(8);
    }

    public function getPostById($id)
    {
        return $this->post::where("id", $id)->get();
    }

    public function getPostComments($post_id)
    {
        return $this->post::find($post_id)->comments;
    }

    public function getPopular($count)
    {
        return $this->post::orderBy("views", "desc")->limit($count)->get();
    }

    public function getPopularByAuthorId($author)
    {
        return $this->post::where("author", $author)->paginate(8);
    }

    public function save($validateFields,  $imagePath){

        $post = Book::create($validateFields + ["img_path" => $imagePath]);

        return ($post);
    }

    public function delete($post_id)
    {
        $post = $this->post;
        if ($post) {

            Storage::delete($post->img_path);
            return $post->delete();

        }
        return $post;
    }

    public function update($validateFields, $imagePath, $post_id)
    {
        $post = $this->post::find($post_id);


        if ($imagePath !== "/"){
            Storage::delete($post->img_path);
            $post->img_path = $imagePath;
        }

        $post->title = $validateFields["title"];
        $post->description = $validateFields["description"];
        $post->author = $validateFields["author"];
        $post->price = $validateFields["price"];
        $post->save();

        return $post->fresh();
    }
}
