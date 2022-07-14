<?php

namespace App\Http\Controllers;

use App\Http\Services\AdminService;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;
    protected $userService;
    protected $roleService;

    public function __construct(AdminService $adminService, UserService $userService, RoleService $roleService)
    {
        $this->adminService = $adminService;
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        return view("Admin.pages.users.index", ["users" => $this->userService->getAll()]);
    }

    public function edit($id)
    {
        return view("Admin.pages.users.edit", ["user" => $this->userService->getUserById($id), "roles" => $this->roleService->getAll()]);
    }

    public function update(Request $request, $id)
    {

        $data = $request->only([
            "status",
            "role",
        ]);

        try {
            $this->adminService->updateUser($data, $id);
        } catch (\Exception $e) {
            return redirect(route("auth.admin.edit"))->withErrors([
                "formError" => "An error occurred"
            ]);
        }

        return redirect(route("auth.admin.users"))->withSuccess("User with id $id have been updated");
    }
}
