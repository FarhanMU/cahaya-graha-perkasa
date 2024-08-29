<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Main\social_media;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $social_media = social_media::orderBy('id', 'desc')->get();
        return view('pages.cms.beranda.social-media.index', compact('social_media'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        // Cari header content berdasarkan ID
        $socialMedia = social_media::findOrFail($id);

        // Update data
        $socialMedia->update([
            'title' => $validatedData['title'],
            'link' => $validatedData['link'],
        ]);

        return redirect()->route('socialMedia.index')->with('success', 'Social Media content updated successfully.');
    }
}
