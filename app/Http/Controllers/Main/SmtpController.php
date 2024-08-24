<?php

namespace App\Http\Controllers\Main;
use App\Http\Controllers\Controller;

use App\Models\Main\send_email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SmtpController extends Controller
{
    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'contact' => $request->contact,
            'description' => $request->description
        ];

        Mail::to('marketing@cahayagrahaperkasa.com')->send(new \App\Mail\sendEmail($details));

        send_email::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Email sent successfully!'], 200);
    }
}
