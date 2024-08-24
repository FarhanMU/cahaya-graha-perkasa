<?php

namespace App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use App\Models\Main\blog;
use App\Models\Main\blog_content;
use App\Models\Main\card;
use App\Models\Main\contact_us;
use App\Models\Main\header;
use App\Models\Main\our_product;
use App\Models\Main\social_media;
use App\Models\Main\why_us;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Mendapatkan bahasa dari request, default 'id' jika tidak ada
        $language = $request->input('lang', 'id');

        $headers = Header::with([
            'contents' => function ($query) use ($language) {
                $query->where('language', $language);
            }
        ])->get();


        $why_us = why_us::with([
            'contents' => function ($query) use ($language) {
                $query->where('language', $language);
            }
        ])->get();


        $our_product = our_product::with([
            'contents' => function ($query) use ($language) {
                $query->where('language', $language);
            }
        ])->get();

        $contact_us = contact_us::with([
            'contents' => function ($query) use ($language) {
                $query->where('language', $language);
            }
        ])->get();

        $social_media = social_media::get();

        // return $social_media;

        return view('pages.main.index', compact('headers', 'why_us', 'our_product', 'contact_us', 'social_media', 'language'));
    }

    public function blogIndex(Request $request)
    {
        // Mendapatkan bahasa dari request, default 'id' jika tidak ada
        $language = $request->input('lang', 'id');

        $headers = Header::with([
            'contents' => function ($query) use ($language) {
                $query->where('language', $language);
            }
        ])->get();

        $blog = blog::with([
            'contents' => function ($query) use ($language) {
                $query->where('language', $language);
            }
        ])->get();

        // return $blog;

        return view('pages.main.blog', compact('blog', 'headers', 'language'));
    }

    public function blogDetail($slug)
    {
        // Ambil blog berdasarkan slug
        $content = blog_content::where('slug', $slug)->firstOrFail();

        // Kirim data ke view
        return view('pages.main.blog-detail', compact('content'));

    }

    public function idCardIndex($slug)
    {

        $card = card::where('slug', $slug)->with('contents')->firstOrFail();
        // return $card;

        return view('pages.main.id-card', compact('card'));
    }

}
