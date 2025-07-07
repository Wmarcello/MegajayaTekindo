<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:30',
            'message' => 'required|string',
        ]);

        // Kirim email ke admin Gmail
        Mail::send('emails.contact-form', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'user_message' => $validated['message'],
        ], function ($message) {
            $message->to('Williammarcello30@gmail.com')
                ->subject('Pesan Kontak dari Website');
        });

       return redirect()->route('contact')->with('success', 'Pesan Anda berhasil dikirim!');
    }
}