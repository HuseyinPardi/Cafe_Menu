<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\Console\Logger\ConsoleLogger;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    public function index(): JsonResponse
    {
        $users = User::where('cafe_name', '!=', 'admin')->get();
        return response()->json($users);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json($user);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['cafe_slug'] = Str::slug($validated['cafe_name']);
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return response()->json($user, 201);

    }
    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $validated = $request->validated();
        $validated['cafe_slug'] = Str::slug($validated['cafe_name']);
        $validated['password'] = Hash::make($validated['password']);

        $user->fill($validated);
        $user->save();
        return response()->json($user);
    }
    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return response()->json(['message' => 'Kullanıcı başarıyla silindi.']);
    }


}
