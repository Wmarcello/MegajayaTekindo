<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserLoggedInNotification; // Import Mailable yang sudah dibuat

class SendLoginNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Dapatkan informasi user yang baru login
        $user = $event->user;

        // Kirim email notifikasi ke alamat email Anda
        Mail::to('Williammarcello30@gmail.com')->send(new UserLoggedInNotification($user));
        // Ganti 'alamat_email_anda@example.com' dengan email Anda
    }
}