<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        //$users = User::all();
        $users = User::where('cafe_name', '!=', 'admin')->get();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Kullanıcı bulunamadı'], 404);
        }

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "phone_number" => "required",
            "cafe_name" => "required",
            "password" => "required"
        ]);

        $user = User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "cafe_name" => $request->cafe_name,
            "cafe_slug" => Str::slug($request->cafe_name),
            "password" => Hash::make($request->password),
            "profile_photo" => null
        ]);

        return response()->json($user, 201);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Kullanıcı bulunamadı'], 404);
        }

        $cafe = $request->input('cafe_name');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->cafe_name = $cafe;
        $user->cafe_slug = Str::slug($cafe);
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json($user);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Kullanıcı bulunamadı'], 404);
        }


        $user->delete();

        return response()->json(['message' => 'Kullanıcı başarıyla silindi.']);
    }
    public function login()
    {
        return view("auth.login");
    }

    public function loginPost(Request $request)
    {


        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            $cafe_slug = Auth::user()->cafe_slug;
            return redirect()->intended(route("cafe.categories", [
                'first_name' => $cafe_slug,
            ]));
        }
        return redirect(route("login"))->with("error", "Login failed");

    }
    public function register()
    {
        return view("auth.register");
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "phone_number" => "required",
            "cafe_name" => "required",
            "password" => "required"
        ]);

        $user = User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "cafe_name" => $request->cafe_name,
            "cafe_slug" => Str::slug($request->cafe_name),
            "password" => Hash::make($request->password),
            "profile_photo" => null
        ]);

        if ($user->save()) {
            return redirect(route("login"))->with("success", "User created succesfully");
        }

        return redirect(route("register"))->with("error", "Failed to create account");


    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }



}
