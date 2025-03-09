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
                 'created_at' => $token->created_at->format('d/m/Y'),
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
