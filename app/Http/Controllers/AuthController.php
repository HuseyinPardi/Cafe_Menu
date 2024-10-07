<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginPost(LoginUserRequest $request): RedirectResponse
    {
        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            $cafe_slug = Auth::user()->cafe_slug;
            return redirect()->route("cafe.categories", [
                'first_name' => $cafe_slug,
            ]);
        }

        return redirect(route("login"))->with("error", "Login failed");

    }
    public function register()
    {
        return view("auth.register");
    }

    public function registerPost(StoreUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['cafe_slug'] = Str::slug($validated['cafe_name']);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        if ($user->save()) {

            $credentials = $request->only("email", "password");

            if (Auth::attempt($credentials)) {

                $cafe_slug = Auth::user()->cafe_slug;

                return redirect()->route("cafe.categories", [
                    'first_name' => $cafe_slug,
                ]);
            }

            return redirect(route("login"))->with("error", "Login failed");
        }

        return redirect(route("register"))->with("error", "Failed to create account");

    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function logoutAdmin(): JsonResponse
    {

        Auth::logout();
        return response()->json([
            'message' => 'Başarıyla çıkış yapıldı'
        ], 200);
    }
}
