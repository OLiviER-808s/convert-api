<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return Inertia::render('Dashboard', [
            'hasTokens' => $user->tokens?->count() > 0,
        ]);
    }
}
