<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Main\send_email;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{

    public function index()
    {

        if (request()->ajax()) {
            $send_email = send_email::all();
            return datatables()->of($send_email)
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.cms.send-email.index');

    }


}
