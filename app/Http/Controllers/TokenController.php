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
             'tokens' => $user->tokens
        ]);
    }

    public function store(StoreToken $request)
    {
        $user = Auth::user();
        $token = $user->createToken($request->name);

        if ($request->wantsJson()) {
            return ['token' => $token->plainTextToken];
        }
    }
}
