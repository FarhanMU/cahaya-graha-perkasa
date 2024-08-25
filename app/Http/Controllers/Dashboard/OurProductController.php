<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;


use App\Models\Main\our_product;
use App\Models\Main\our_product_content;
use Illuminate\Http\Request;

class OurProductController extends Controller
{
    public function index()
    {
        $our_product = our_product::with([
            'contents' => function ($query) {
                $query->orderBy('id', 'desc');
            }
        ])->orderBy('created_at', 'desc')->get();
        return view('pages.cms.beranda.our-product.index', compact('our_product'));

    }

    public function create()
    {
        // Mengembalikan view untuk form create
        return view('pages.cms.beranda.our-product.create');
    }

    public function store(Request $request)
    {
        // Validasi input untuk bahasa Inggris
        $validatedDataEn = $request->validate([
            'title_en' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'image_en' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk gambar bahasa Inggris
        ]);

        // Validasi input untuk bahasa Indonesia
        $validatedDataId = $request->validate([
            'title_id' => 'nullable|string|max:255',
            'description_id' => 'nullable|string',
            'image_id' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk gambar bahasa Indonesia
        ]);

        // Jika ada input yang kosong, ubah menjadi "-"
        $validatedDataEn = array_map(function ($value) {
            return $value ?: '-';
        }, $validatedDataEn);

        $validatedDataId = array_map(function ($value) {
            return $value ?: '-';
        }, $validatedDataId);

        // Simpan data baru ke dalam tabel our_product untuk mendapatkan our_product_id
        $ourProduct = our_product::create();

        // Handle Image Upload for English
        if ($request->hasFile('image_en')) {
            $imageNameEn = time() . '_en.' . $request->image_en->extension();
            $request->image_en->move(public_path('assets/img/custom/storage/product'), $imageNameEn);
            $validatedDataEn['image'] = $imageNameEn;
        }

        // Handle Image Upload for Indonesian
        if ($request->hasFile('image_id')) {
            $imageNameId = time() . '_id.' . $request->image_id->extension();
            $request->image_id->move(public_path('assets/img/custom/storage/product'), $imageNameId);
            $validatedDataId['image'] = $imageNameId;
        }

        // Simpan data baru ke dalam tabel our_product_content untuk bahasa Inggris
        our_product_content::create([
            'our_product_id' => $ourProduct->id, // Use the id from the our_product table
            'language' => 'en',
            'title' => $validatedDataEn['title_en'],
            'description' => $validatedDataEn['description_en'],
            'image' => $validatedDataEn['image'] ?? null, // Save image name if exists
        ]);

        // Simpan data baru ke dalam tabel our_product_content untuk bahasa Indonesia
        our_product_content::create([
            'our_product_id' => $ourProduct->id, // Use the id from the our_product table
            'language' => 'id',
            'title' => $validatedDataId['title_id'],
            'description' => $validatedDataId['description_id'],
            'image' => $validatedDataId['image'] ?? null, // Save image name if exists
        ]);

        return redirect()->route('ourProduct.index')->with('success', 'Our Product content created successfully.');
    }





    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk gambar
        ]);

        // Cari header content berdasarkan ID
        $ourProductContent = our_product_content::findOrFail($id);

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($ourProductContent->image) {
                $oldImagePath = public_path('assets/img/custom/storage/product/' . $ourProductContent->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/custom/storage/product'), $imageName);

            // Update data dengan gambar baru
            $ourProductContent->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'image' => $imageName, // Simpan nama gambar ke dalam database
            ]);
        } else {
            // Update data tanpa mengubah gambar
            $ourProductContent->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
            ]);
        }

        return redirect()->route('ourProduct.index')->with('success', 'Our Product content updated successfully.');
    }



    public function destroy($id)
    {
        // Find the ourProduct record by ID
        $ourProduct = our_product::findOrFail($id);

        // Loop through each content related to the ourProduct
        foreach ($ourProduct->contents as $content) {
            // Check if there is an image associated with this content
            if ($content->image) {
                // Delete the image from the storage
                $imagePath = public_path('assets/img/custom/storage/product/' . $content->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Delete the content record itself
            $content->delete();
        }

        // Delete the ourProduct record itself
        $ourProduct->delete();

        // Redirect back with a success message
        return redirect()->route('ourProduct.index')->with('success', 'Our Product content deleted successfully.');
    }

}
