<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;


use App\Models\Main\blog;
use App\Models\Main\blog_content;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class BlogController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $blog = Blog::with([
                'contents' => function ($query) {
                    $query->where('language', 'id');
                }
            ])
                ->get();

            // Filter blog yang memiliki konten dalam bahasa Indonesia
            $filteredBlog = $blog->filter(function ($blog) {
                return $blog->contents->isNotEmpty();
            });

            return datatables()->of($filteredBlog)
                ->addIndexColumn()
                ->addColumn('title', function ($row) {
                    return $row->contents->first()->title ?? '';
                })
                ->addColumn('description', function ($row) {
                    return Str::limit(strip_tags($row->contents->first()->description ?? ''), 300, '...');
                })
                ->addColumn('visitor', function ($row) {
                    return $row->contents->first()->visitor ?? '';
                })
                ->rawColumns(['title', 'description', 'visitor'])
                ->make(true);
        }


        return view('pages.cms.blog.index');
    }



    public function create()
    {
        return view('pages.cms.blog.create');

    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'content.en.title' => 'required|string|max:255',
            'content.en.description' => 'required|string',
            'content.en.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'content.id.title' => 'required|string|max:255',
            'content.id.description' => 'required|string',
            'content.id.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Buat entitas blog
        $blog = Blog::create();

        // Direktori penyimpanan gambar
        $storagePath = 'assets/img/custom/storage/blog/';

        // Inisialisasi ImageManager dengan GD driver
        $manager = new ImageManager(new Driver());

        // Simpan gambar bahasa Inggris dan resize
        $imageFileEn = $request->file('content.en.image');
        $imageNameEn = time() . '_en.' . $imageFileEn->extension();
        $imagePathEn = public_path($storagePath . $imageNameEn);

        // Resize gambar bahasa Inggris
        $image = $manager->read($imageFileEn);
        $newWidth = intval($image->width() * 0.5);
        $newHeight = intval($image->height() * 0.5);
        $image->resize($newWidth, $newHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($imagePathEn);

        // Simpan konten dalam bahasa Inggris
        blog_content::create([
            'blog_id' => $blog->id,
            'language' => 'en',
            'title' => $validatedData['content']['en']['title'],
            'description' => $validatedData['content']['en']['description'],
            'slug' => Str::slug($validatedData['content']['en']['title']),
            'visitor' => 0,
            'image' => $imageNameEn,
        ]);

        // Simpan gambar bahasa Indonesia dan resize
        $imageFileId = $request->file('content.id.image');
        $imageNameId = time() . '_id.' . $imageFileId->extension();
        $imagePathId = public_path($storagePath . $imageNameId);

        // Resize gambar bahasa Indonesia
        $image = $manager->read($imageFileId);
        $newWidth = intval($image->width() * 0.5);
        $newHeight = intval($image->height() * 0.5);
        $image->resize($newWidth, $newHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($imagePathId);

        // Simpan konten dalam bahasa Indonesia
        blog_content::create([
            'blog_id' => $blog->id,
            'language' => 'id',
            'title' => $validatedData['content']['id']['title'],
            'description' => $validatedData['content']['id']['description'],
            'slug' => Str::slug($validatedData['content']['id']['title']),
            'visitor' => 0,
            'image' => $imageNameId,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }





    public function edit($id)
    {
        $blog = blog::with([
            'contents' => function ($query) {
                $query->whereIn('language', ['en', 'id']);
            }
        ])->findOrFail($id);

        $blog->contents = $blog->contents->keyBy('language');

        return view('pages.cms.blog.edit', compact('blog'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'content.en.title' => 'required|string|max:255',
            'content.en.description' => 'required|string',
            'content.en.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'content.id.title' => 'required|string|max:255',
            'content.id.description' => 'required|string',
            'content.id.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Temukan blog dan update kontennya
        $blog = blog::findOrFail($id);

        // Direktori penyimpanan gambar
        $storagePath = 'assets/img/custom/storage/blog/';

        // Inisialisasi ImageManager dengan GD driver
        $manager = new ImageManager(new Driver());

        // Update konten bahasa Inggris
        $contentEn = $blog->contents()->where('language', 'en')->first();
        $contentEn->update([
            'title' => $validatedData['content']['en']['title'],
            'description' => $validatedData['content']['en']['description'],
            'slug' => Str::slug($validatedData['content']['en']['title']),
        ]);

        if ($request->hasFile('content.en.image')) {
            // Hapus gambar lama jika ada
            if ($contentEn->image && file_exists(public_path($storagePath . $contentEn->image))) {
                unlink(public_path($storagePath . $contentEn->image));
            }

            // Simpan gambar baru dan lakukan resize
            $imageFileEn = $request->file('content.en.image');
            $imageNameEn = time() . '_en.' . $imageFileEn->extension();
            $imagePathEn = public_path($storagePath . $imageNameEn);

            // Resize gambar bahasa Inggris
            $image = $manager->read($imageFileEn);
            $newWidth = intval($image->width() * 0.5);
            $newHeight = intval($image->height() * 0.5);
            $image->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($imagePathEn);

            $contentEn->update(['image' => $imageNameEn]);
        }

        // Update konten bahasa Indonesia
        $contentId = $blog->contents()->where('language', 'id')->first();
        $contentId->update([
            'title' => $validatedData['content']['id']['title'],
            'description' => $validatedData['content']['id']['description'],
            'slug' => Str::slug($validatedData['content']['id']['title']),
        ]);

        if ($request->hasFile('content.id.image')) {
            // Hapus gambar lama jika ada
            if ($contentId->image && file_exists(public_path($storagePath . $contentId->image))) {
                unlink(public_path($storagePath . $contentId->image));
            }

            // Simpan gambar baru dan lakukan resize
            $imageFileId = $request->file('content.id.image');
            $imageNameId = time() . '_id.' . $imageFileId->extension();
            $imagePathId = public_path($storagePath . $imageNameId);

            // Resize gambar bahasa Indonesia
            $image = $manager->read($imageFileId);
            $newWidth = intval($image->width() * 0.5);
            $newHeight = intval($image->height() * 0.5);
            $image->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($imagePathId);

            $contentId->update(['image' => $imageNameId]);
        }

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan blog berdasarkan ID
        $blog = blog::findOrFail($id);

        // Direktori penyimpanan gambar
        $storagePath = 'assets/img/custom/storage/blog/';

        // Hapus semua konten yang terkait dengan blog
        foreach ($blog->contents as $content) {
            // Hapus gambar jika ada
            if ($content->image && file_exists(public_path($storagePath . $content->image))) {
                unlink(public_path($storagePath . $content->image));
            }

            // Hapus konten
            $content->delete();
        }

        // Hapus blog
        $blog->delete();

        return response()->json([
            'message' => 'Blog and its contents deleted successfully.'
        ]);
    }

}
