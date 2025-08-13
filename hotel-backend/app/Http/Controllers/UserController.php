<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        // Exemplo de resposta para dashboard
        return response()->json(['message' => 'Dashboard de usuário', 'user' => Auth::user()]);
    }

    public function me()
    {
        return response()->json(['user' => Auth::user()]);
    }
}
