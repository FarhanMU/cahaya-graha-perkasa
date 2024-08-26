<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;


use App\Models\Main\our_product;
use App\Models\Main\our_product_content;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class OurProductController extends Controller
{
    public function index()
    {
        $our_product = our_product::with([
            'contents' => function ($query) {
                $query->orderBy('id', 'desc');
            }
        ])->orderBy('id', 'desc')->get();
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

        // Inisialisasi ImageManager dengan driver yang diinginkan
        $manager = new ImageManager(new Driver());

        // Handle Image Upload and Resize for English
        if ($request->hasFile('image_en')) {
            $imageFile = $request->file('image_en');
            $imageNameEn = time() . '_en.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('assets/img/custom/storage/product/' . $imageNameEn);

            // Baca gambar dan lakukan resize
            $image = $manager->read($imageFile);

            // Dapatkan ukuran asli gambar
            $originalWidth = $image->width();
            $originalHeight = $image->height();

            // Hitung ukuran baru (60% dari ukuran asli)
            $newWidth = intval($originalWidth * 0.5);
            $newHeight = intval($originalHeight * 0.5);

            // Resize gambar ke ukuran baru
            $image->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->save($imagePath);

            $validatedDataEn['image'] = $imageNameEn;
        }

        // Handle Image Upload and Resize for Indonesian
        if ($request->hasFile('image_id')) {
            $imageFile = $request->file('image_id');
            $imageNameId = time() . '_id.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('assets/img/custom/storage/product/' . $imageNameId);

            // Baca gambar dan lakukan resize
            $image = $manager->read($imageFile);
            // Dapatkan ukuran asli gambar
            $originalWidth = $image->width();
            $originalHeight = $image->height();

            // Hitung ukuran baru (60% dari ukuran asli)
            $newWidth = intval($originalWidth * 0.5);
            $newHeight = intval($originalHeight * 0.5);

            // Resize gambar ke ukuran baru
            $image->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->save($imagePath);

            $validatedDataId['image'] = $imageNameId;
        }

        // Simpan data baru ke dalam tabel our_product_content untuk bahasa Inggris
        our_product_content::create([
            'our_product_id' => $ourProduct->id, // Gunakan id dari tabel our_product
            'language' => 'en',
            'title' => $validatedDataEn['title_en'],
            'description' => $validatedDataEn['description_en'],
            'image' => $validatedDataEn['image'] ?? null, // Simpan nama gambar jika ada
        ]);

        // Simpan data baru ke dalam tabel our_product_content untuk bahasa Indonesia
        our_product_content::create([
            'our_product_id' => $ourProduct->id, // Gunakan id dari tabel our_product
            'language' => 'id',
            'title' => $validatedDataId['title_id'],
            'description' => $validatedDataId['description_id'],
            'image' => $validatedDataId['image'] ?? null, // Simpan nama gambar jika ada
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

        // Inisialisasi ImageManager dengan driver yang diinginkan
        $manager = new ImageManager(new Driver());

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
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('assets/img/custom/storage/product/' . $imageName);

            // Baca gambar dan lakukan resize
            $image = $manager->read($imageFile);
            // Dapatkan ukuran asli gambar
            $originalWidth = $image->width();
            $originalHeight = $image->height();

            // Hitung ukuran baru (60% dari ukuran asli)
            $newWidth = intval($originalWidth * 0.5);
            $newHeight = intval($originalHeight * 0.5);

            // Resize gambar ke ukuran baru
            $image->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->save($imagePath);

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
