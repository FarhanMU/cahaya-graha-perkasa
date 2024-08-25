<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Main\blog;
use App\Models\Main\card;
use App\Models\Main\send_email;

class DashboardController extends Controller
{
    public function index()
    {
        $send_email = send_email::count();
        $card = card::count();
        $blog = blog::count();

        return view('pages.cms.dashboard.index', compact('send_email', 'card', 'blog'));
    }
}
