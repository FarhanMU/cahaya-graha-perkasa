<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.cms.dashboard.index');
    }
}
