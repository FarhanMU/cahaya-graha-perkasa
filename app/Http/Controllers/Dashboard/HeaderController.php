<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Main\header;
use App\Models\Main\header_content;
use Illuminate\Http\Request;

class HeaderController extends Controller
{

    public function index()
    {
        $header = Header::with([
            'contents' => function ($query) {
                $query->orderBy('id', 'desc');
            }
        ])->get();
        return view('pages.cms.beranda.header.index', compact('header'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Cari header content berdasarkan ID
        $headerContent = header_content::findOrFail($id);

        // Update data
        $headerContent->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('header.index')->with('success', 'Header content updated successfully.');
    }


}
