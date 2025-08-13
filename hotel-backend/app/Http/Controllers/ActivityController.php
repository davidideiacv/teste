<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        return response()->json(Activity::latest()->take(50)->get());
    }

    public function realtime()
    {
        // Exemplo: últimas 10 atividades
        return response()->json(Activity::latest()->take(10)->get());
    }
}
