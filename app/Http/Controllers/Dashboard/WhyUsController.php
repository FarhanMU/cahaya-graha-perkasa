<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Main\why_us;
use App\Models\Main\why_us_content;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index()
    {
        $why_us = why_us::with([
            'contents' => function ($query) {
                $query->orderBy('id', 'desc');
            }
        ])->orderBy('created_at', 'desc')->get();
        return view('pages.cms.beranda.why-us.index', compact('why_us'));

    }

    public function create()
    {
        // Mengembalikan view untuk form create
        return view('pages.cms.beranda.why-us.create');
    }

    public function store(Request $request)
    {
        // Validasi input untuk bahasa Inggris
        $validatedDataEn = $request->validate([
            'title_en' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
        ]);

        // Validasi input untuk bahasa Indonesia
        $validatedDataId = $request->validate([
            'title_id' => 'nullable|string|max:255',
            'description_id' => 'nullable|string',
        ]);

        // Jika ada input yang kosong, ubah menjadi "-"
        $validatedDataEn = array_map(function ($value) {
            return $value ?: '-';
        }, $validatedDataEn);

        $validatedDataId = array_map(function ($value) {
            return $value ?: '-';
        }, $validatedDataId);

        // Simpan data baru ke dalam tabel why_us untuk mendapatkan why_us_id
        $whyUs = why_us::create();

        // Simpan data baru ke dalam tabel why_us_content untuk bahasa Inggris
        why_us_content::create([
            'why_us_id' => $whyUs->id, // Use the id from the why_us table
            'language' => 'en',
            'title' => $validatedDataEn['title_en'],
            'description' => $validatedDataEn['description_en'],
        ]);

        // Simpan data baru ke dalam tabel why_us_content untuk bahasa Indonesia
        why_us_content::create([
            'why_us_id' => $whyUs->id, // Use the id from the why_us table
            'language' => 'id',
            'title' => $validatedDataId['title_id'],
            'description' => $validatedDataId['description_id'],
        ]);

        return redirect()->route('whyUs.index')->with('success', 'Why Us content created successfully.');
    }




    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Cari header content berdasarkan ID
        $whyUsContent = why_us_content::findOrFail($id);

        // Update data
        $whyUsContent->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('whyUs.index')->with('success', 'Why Us content updated successfully.');
    }

    public function destroy($id)
    {
        // Find the WhyUs record by ID
        $whyUs = why_us::findOrFail($id);

        // Delete related content first (assuming there's a relationship defined)
        $whyUs->contents()->delete();

        // Delete the WhyUs record itself
        $whyUs->delete();

        // Redirect back with a success message
        return redirect()->route('whyUs.index')->with('success', 'Why Us content deleted successfully.');
    }
}
