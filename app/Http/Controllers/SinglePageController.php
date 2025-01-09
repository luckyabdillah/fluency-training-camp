<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $name = str_replace(' ', '%20', $validatedData['name']);
        $subject = str_replace(' ', '%20', $validatedData['subject']);
        $body = str_replace(' ', '%20', $validatedData['body']);

        $mailToLink = "mailto:fluency@luckyabdillah.com?subject=$subject&body=$body%0a%0a%0a%0a- $name";

        return redirect($mailToLink);
    }
}
