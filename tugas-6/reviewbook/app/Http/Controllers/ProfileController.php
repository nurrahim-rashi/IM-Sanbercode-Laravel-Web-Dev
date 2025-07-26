<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|string',
        ]);

        Profile::create([
            'age' => $request->age,
            'address' => $request->address,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('dashboard')->with('success', 'Profil berhasil dibuat');
    }

    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|string',
        ]);

        $profile = Auth::user()->profile;
        $profile->update($request->only('age', 'address'));

        return redirect()->route('dashboard')->with('success', 'Profil berhasil diperbarui');
    }
public function show()
{
    $profile = Auth::user()->profile;

    if (!$profile) {
        return redirect()->route('profile.create')->with('info', 'Yuk lengkapi profil kamu dulu!');
    }

    return view('profile.show', compact('profile'));
}

}