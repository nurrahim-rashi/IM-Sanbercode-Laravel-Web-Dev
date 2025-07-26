<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        $recentComments = Comment::with(['user', 'book'])
            ->latest()
            ->take(5)
            ->get();

    return view('dashboard', compact('recentComments'));
}
}