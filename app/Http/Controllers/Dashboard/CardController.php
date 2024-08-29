<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\Main\card;
use App\Models\Main\card_content;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CardController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $card = card::all();
            return datatables()->of($card)
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.cms.card.index');

    }


    public function create()
    {
        return view('pages.cms.card.create');

    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'content.whatsapp' => 'nullable|string|max:255',
            'content.email' => 'nullable|email|max:255',
            'content.instagram' => 'nullable|string|max:255',
            'content.tiktok' => 'nullable|string|max:255',
            'content.facebook' => 'nullable|string|max:255',
        ]);

        // Generate slug dari name
        $slug = Str::slug($validatedData['name']);

        // Pastikan slug unik
        $count = card::where('slug', 'LIKE', "$slug%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        // Simpan data card ke dalam database
        $card = card::create([
            'name' => $validatedData['name'],
            'position' => $validatedData['position'],
            'slug' => $slug,
        ]);

        // Simpan data content ke dalam tabel card_content
        $contentData = [
            [
                'card_id' => $card->id,
                'title' => 'WhatsApp',
                'description' => $validatedData['content']['whatsapp'] ?? null,
            ],
            [
                'card_id' => $card->id,
                'title' => 'Email',
                'description' => $validatedData['content']['email'] ?? null,
            ],
            [
                'card_id' => $card->id,
                'title' => 'Instagram',
                'description' => $validatedData['content']['instagram'] ?? null,
            ],
            [
                'card_id' => $card->id,
                'title' => 'TikTok',
                'description' => $validatedData['content']['tiktok'] ?? null,
            ],
            [
                'card_id' => $card->id,
                'title' => 'Facebook',
                'description' => $validatedData['content']['facebook'] ?? null,
            ],
        ];

        // Filter out null descriptions
        $contentData = array_filter($contentData, function ($content) {
            return !is_null($content['description']);
        });

        // Simpan data content yang sudah difilter
        foreach ($contentData as $content) {
            card_content::create($content);
        }

        // Redirect kembali ke halaman index card dengan pesan sukses
        return redirect()->route('card.index')->with('success', 'Card created successfully.');
    }


    public function edit($id)
    {
        // Ambil data card berdasarkan ID
        $card = card::with([
            'contents' => function ($query) {
                $query->orderBy('id', 'desc');
            }
        ])->findOrFail($id);

        // Tampilkan view edit dengan data card
        return view('pages.cms.card.edit', compact('card'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'content.whatsapp' => 'nullable|string|max:255',
            'content.email' => 'nullable|email|max:255',
            'content.instagram' => 'nullable|string|max:255',
            'content.tiktok' => 'nullable|string|max:255',
            'content.facebook' => 'nullable|string|max:255',
        ]);

        // Temukan card berdasarkan ID
        $card = card::findOrFail($id);

        // Update data card
        $card->name = $validatedData['name'];
        $card->position = $validatedData['position'];

        // Generate slug dari name jika berbeda
        $slug = Str::slug($validatedData['name']);
        if ($card->slug != $slug) {
            $count = card::where('slug', 'LIKE', "$slug%")->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
            $card->slug = $slug;
        }

        $card->save();

        // Update atau buat baru data content dalam tabel card_content
        $contents = [
            'WhatsApp' => $validatedData['content']['whatsapp'] ?? null,
            'Email' => $validatedData['content']['email'] ?? null,
            'Instagram' => $validatedData['content']['instagram'] ?? null,
            'TikTok' => $validatedData['content']['tiktok'] ?? null,
            'Facebook' => $validatedData['content']['facebook'] ?? null,
        ];

        foreach ($contents as $title => $description) {
            $content = card_content::where('card_id', $card->id)
                ->where('title', $title)
                ->first();

            if ($description) {
                if ($content) {
                    // Update existing content
                    $content->description = $description;
                    $content->save();
                } else {
                    // Create new content
                    card_content::create([
                        'card_id' => $card->id,
                        'title' => $title,
                        'description' => $description,
                    ]);
                }
            } else {
                if ($content) {
                    // Delete content if description is null
                    $content->delete();
                }
            }
        }

        // Redirect kembali ke halaman index card dengan pesan sukses
        return redirect()->route('card.index')->with('success', 'Card updated successfully.');
    }


    public function destroy($id)
    {
        $card = card::findOrFail($id);

        // Hapus semua content yang terkait dengan card
        $card->contents()->delete();

        // Hapus card
        $card->delete();

        return response()->json([
            'message' => 'Card and its contents deleted successfully.'
        ]);
    }



}
