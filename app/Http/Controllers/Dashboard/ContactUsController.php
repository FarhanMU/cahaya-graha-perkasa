<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Main\contact_us;
use App\Models\Main\contact_us_content;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contact_us = contact_us::with([
            'contents' => function ($query) {
                $query->orderBy('id', 'desc');
            }
        ])->orderBy('id', 'desc')->get();
        return view('pages.cms.beranda.contact-us.index', compact('contact_us'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Cari header content berdasarkan ID
        $contactUsContent = contact_us_content::findOrFail($id);

        // Update data
        $contactUsContent->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('contactUs.index')->with('success', 'Contact Us content updated successfully.');
    }
}
