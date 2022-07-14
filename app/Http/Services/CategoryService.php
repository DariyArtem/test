<?php


namespace App\Http\Services;


use App\Http\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryService
{


    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function getCategoryNameById($id)
    {
        return $this->categoryRepository->getCategoryNameById($id);
    }

    public function save($data)
    {
        $validated = Validator::make($data, [
            "name" => "required",
            "image" => "required|image|mimetypes:image/jpeg,image/png",
        ])->validate();

        $img_path = Storage::put("img/categories", $validated["image"]);

        $validated["image"] = $img_path;

        return $this->categoryRepository->save($validated);
    }

    public function edit($request, $id)
    {
        $validated = $request->validate([
            "name" => "required",
        ]);

        $img = "/";

        if ($request->image !== null) {

            $validatedImg = $request->validate([
                "image" => "required",
            ]);

            $img = $validatedImg["image"];
        }

        return $this->categoryRepository->update($id, $validated, $img);

    }
}
