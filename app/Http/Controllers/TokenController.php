<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TokenController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return Inertia::render('Tokens', [
             'tokens' => $user->tokens->map(fn ($token) => [
                 'name' => $token->name,
                 'last_used_at' => $token->last_used_at,
                 'created_at' => $token->created_at,
                 'expires_at' => $token->expires_at,
             ])
        ]);
    }

    public function store(StoreToken $request)
    {
        $user = Auth::user();
        $token = $user->createToken($request->name);

        return ['token' => $token->plainTextToken];
    }
}
