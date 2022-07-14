<?php


namespace App\Http\Services;

use App\Http\Repositories\AdminRepository;
use Illuminate\Support\Facades\Validator;


class AdminService
{
    protected $adminRepository;


    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function updateUser($data, $id)
    {

        $validated = Validator::make($data, [
            "status" => "required",
            "role" => "required",
        ])->validate();

        $status = 0;

        if ($validated["status"] === "Active") {
            $status = 1;
        }

       return $this->adminRepository->save($validated, $id, $status);

    }
}
