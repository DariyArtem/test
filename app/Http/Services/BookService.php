<?php


namespace App\Http\Services;


use App\Helpers\DateFormatHelper;
use App\Http\Repositories\PostRepository;
use App\Models\Favourite;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class BookService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function removeFromFav($request)
    {
        return $this->postRepository->removeFromFav($request);
    }

    public function addToFav($request)
    {
        $validated = $request->validate([
            "user_id" => "required",
            "post_id" => "required",
        ]);
        return $this->postRepository->addToFav($validated);
    }

    public function getRecomendations($user)
    {
        //Беремо з БД ідентификатор останнього улюбленого поста поточного юзера
        $lastUserFavPostId = Favourite::where('user_id',$user->id)
            ->orderBy('created_at', 'desc')->first()->post_id;
        // Обираємо з БД 5 останніх за датою записів про вподобання цього посту
        $lastEntries = Favourite::where('post_id', $lastUserFavPostId)
            ->where('user_id', '!=', $user->id)->limit(5)
            ->orderBy("created_at", "desc")->get();
        $recommendations = [];
        foreach ($lastEntries as $post){

            $post_id = Favourite::where('user_id', $post->user_id)
                ->orderBy('created_at', 'desc')->first()->post_id;
            array_push($recommendations, Book::where('id', $post_id)->first());
        }

        return $recommendations;
    }

    public function getFeatured()
    {
        return $this->postRepository->getFeatured();
    }

    public function getPostById($id)
    {
        return $this->postRepository->getPostById($id);
    }

    public function getPostComments($post_id)
    {
        return $this->postRepository->getPostComments($post_id);
    }

    public function validationOfQuery($request)
    {
        return $request->validate([
            "title" => "required"
        ]);
    }

    public function searchByQuery($validatedField)
    {
        return $this->postRepository->searchByQuery($validatedField);
    }

    public function getLatestPosts($count)
    {
        return $this->postRepository->getLatestPosts($count);
    }

    public function getPopular($count)
    {
        return $this->postRepository->getPopular($count);
    }

    public function getPopularByAuthor($author)
    {
        return $this->postRepository->getPopularByAuthorId($author);
    }

    public function getLatestPostsByAuthorId($id)
    {
        return $this->postRepository->getLatestPostsByAuthorId($id);
    }

    public function getDatesOfPosts($posts)
    {
        $dates = [];

        foreach ($posts as $post) {
            array_push($dates, DateFormatHelper::index($post->created_at));
        }
        return $dates;
    }

    public function save($request)
    {

        $validateFields = $request->validate([
            "title" => "required",
            "price" => "required",
            "author" => "required",
            "description" => "required",
            "image" => "required|image|mimetypes:image/jpeg,image/png,image/jpg",
            "category_id" => "required|integer",
        ]);

        $imagePath = Storage::put("img", $validateFields["image"]);

        return $this->postRepository->save($validateFields, $imagePath);
    }

    public function getSimilarPostsByCategoryId($post_id)
    {
        return $this->postRepository->getSimilarPostsByCategoryId($post_id);
    }

    public function delete($post_id)
    {
        $delete = Book::where("id", $post_id)->first();
        if ($delete) {

            Storage::delete($delete->img_path);
            $delete->delete();

        }

        return redirect(route("posts"))->withErrors([
            "formError" => "An error occurred"
        ]);
    }

    public function update($request, $post_id)
    {

        $validateFields = $request->validate([
            "title" => "required",
            "price" => "required",
            "author" => "required",
            "description" => "required",
        ]);

        $imagePath = '/';

        if ($request->image !== null) {

            $validateImage = $request->validate([
                "image" => "image|mimes:jpeg,png,jpg,gif,svg",
            ]);

            $imagePath = Storage::put("img", $validateImage["image"]);

        }


        return $this->postRepository->update($validateFields, $imagePath, $post_id);

    }
}
