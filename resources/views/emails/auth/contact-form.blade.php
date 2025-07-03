{{-- resources/views/emails/contact-form.blade.php --}}

@component('mail::message')
    # Pesan Baru dari Form Kontak

    Halo,
    Anda telah menerima pesan baru dari form kontak di website Anda:

    **Nama:** {{ $name }}
    **Email:** {{ $email }}
    **Pesan:**
    @component('mail::panel')
        {{ $message }}
    @endcomponent

    Terima kasih,
    {{ config('app.name') }}
@endcomponent
