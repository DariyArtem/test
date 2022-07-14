<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function registerPage()
    {
        return view("pages.register");
    }

    public function store(Request $request)
    {
        $data = $request->only([
            "email",
            "password",
            "name",
            "phone",
            "surname",
            "country",
            "region",
            "city",
        ]);

        try {
            $this->userService->saveUser($data);
        } catch (\Exception $e){
            return redirect(route("register"))->withErrors([
                "email" => "An error occurred"
            ]);
        }
        return redirect(route("private"));

    }
    public function loginPage()
    {
        return view("pages.login");
    }

    public function login(Request $request)
    {
        $formFields = $request->only(["email", "password"]);
        if (Auth::attempt($formFields)) {
            return redirect()->intended(route("private"));
        }

        return redirect(route("login"))->withErrors([
            "formMessage" => "Email or password is incorrect"
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
