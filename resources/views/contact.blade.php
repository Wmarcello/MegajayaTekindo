@extends('layouts.main')

@section('title', 'Contact Us')

@section('content')
    <div class="bg-white py-12 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">
            <h1 class="text-4xl font-bold text-center text-red-600 mb-4">Contact Us</h1>
            <p class="text-center text-gray-600 mb-10 max-w-2xl mx-auto">
                Hubungi kami untuk kebutuhan pompa industri, konsultasi teknis, atau informasi lebih lanjut mengenai produk
                dan layanan kami. Kami siap membantu Anda!
            </p>

            <!-- Kontak Section: Form & WhatsApp Sales -->
            <div
                class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 bg-stone-100 rounded-3xl shadow-2xl p-6 md:p-10 mb-12">
                <!-- Form Kontak -->
                <div class="flex flex-col justify-center">
                    <h2 class="text-3xl font-extrabold text-red-600 mb-2 text-left">Kirim Pesan ke Kami</h2>
                    <p class="text-gray-600 mb-6 text-base">Pesan Anda akan dikirim ke email admin kami (Gmail).</p>
                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6" x-data="{ loading: false }"
                        @submit="loading = true">
                        @csrf
                        <div>
                            <label for="name" class="block font-semibold mb-2 text-gray-800">Nama</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-400 focus:outline-none transition placeholder-gray-400 text-base"
                                value="{{ old('name') }}" placeholder="Nama Anda">
                            @error('name')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block font-semibold mb-2 text-gray-800">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-400 focus:outline-none transition placeholder-gray-400 text-base"
                                value="{{ old('email') }}" placeholder="Alamat Email">
                            @error('email')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block font-semibold mb-2 text-gray-800">No. Telepon</label>
                            <input type="text" id="phone" name="phone" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-400 focus:outline-none transition placeholder-gray-400 text-base"
                                value="{{ old('phone') }}" placeholder="Nomor Telepon">
                            @error('phone')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="message" class="block font-semibold mb-2 text-gray-800">Pesan</label>
                            <textarea id="message" name="message" rows="4" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-400 focus:outline-none transition placeholder-gray-400 text-base"
                                placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Recaptcha --}}
                        <div class="mb-4">
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="text-left">
                            <button type="submit" :disabled="loading"
                                class="w-full md:w-auto flex items-center justify-center gap-2 bg-red-600 hover:bg-amber-500 text-white font-bold px-8 py-3 rounded-lg transition text-lg shadow-lg disabled:opacity-60 disabled:cursor-not-allowed">
                                <template x-if="loading">
                                    <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                    </svg>
                                </template>
                                <span x-text="loading ? 'Mengirim...' : 'Kirim Pesan'"></span>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- WhatsApp Sales -->
                <div class="flex flex-col items-center justify-center bg-white rounded-2xl shadow p-6 md:p-8">
                    <h3 class="text-2xl font-bold text-green-600 mb-2 text-center">Hubungi Sales via WhatsApp</h3>
                    <p class="text-gray-700 mb-4 text-center">Klik tombol di bawah untuk chat langsung dengan sales kami.
                    </p>
                    <a :href="`https://wa.me/6285775230813?text=Halo%20Admin%20MJT.%20saya%20mendapatkan%20nomor%20anda%20dari%20website.%20saya%20ingin%20bertanya%20tentang%20produk%20serta%20spesifikasi%20pompa%20yang%20dijual%20sesuai%20kebutuhan%20saya.%20Terima%20kasih.%0ANama:%20${encodeURIComponent(name)}%0AEmail:%20${encodeURIComponent(email)}`"
                        href="https://wa.me/6285775230813?text=Halo%20Admin%20MJT.%20saya%20mendapatkan%20nomor%20anda%20dari%20website.%20saya%20ingin%20bertanya%20tentang%20produk%20serta%20spesifikasi%20pompa%20yang%20dijual%20sesuai%20kebutuhan%20saya.%20Terima%20kasih.%0ANama:%20${encodeURIComponent(name)}%0AEmail:%20${encodeURIComponent(email)}`"
                        target="_blank" x-data="{ clicked: false, name: '', email: '' }"
                        @click="if(clicked){ $event.preventDefault(); } else { clicked = true; }"
                        :class="{ 'opacity-50 pointer-events-none': clicked }"
                        class="w-full md:w-auto flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold px-8 py-3 rounded-lg transition text-lg shadow-lg mb-2"
                        x-init="$nextTick(() => {
                            const nameInput = document.getElementById('name');
                            const emailInput = document.getElementById('email');
                            if (nameInput) name = nameInput.value;
                            if (emailInput) email = emailInput.value;
                            nameInput && nameInput.addEventListener('input', e => name = e.target.value);
                            emailInput && emailInput.addEventListener('input', e => email = e.target.value);
                        });">
                        <i class="bi bi-whatsapp"></i>
                        <span>+62 857-7523-0813</span>
                    </a>
                    <div class="text-gray-700 text-center text-sm mb-10">Sales: William Marcello</div>
                </div>
            </div>

            <!-- Lokasi: Workshop & Kantor Pusat -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
                <!-- Lokasi 1: Workshop -->
                <div class="bg-stone-100 rounded-xl shadow-lg p-6 flex flex-col gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-red-600 mb-1">Workshop</h2>
                        <p class="text-gray-700 mb-3">
                            JL. Kav. DPR Blk. A No.321, Kenanga, Kec. Cipondoh, Kota Tangerang, Banten 15146
                        </p>
                        <a href="https://maps.app.goo.gl/RL55kLBSvSYSvuhN9" target="_blank"
                            class="inline-block bg-red-600 hover:bg-red-800 text-white px-4 py-2 rounded text-sm font-semibold transition">
                            Buka di Google Maps
                        </a>
                    </div>

                    <!-- Peta -->
                    <div>
                        <h4 class="text-sm text-gray-600 font-semibold mt-3 mb-2">Lihat Lokasi Kami</h4>
                        <div class="relative overflow-hidden rounded-lg shadow aspect-w-16 aspect-h-9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3966.539977495366!2d106.6872222!3d-6.1922500000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMTEnMzIuMSJTIDEwNsKwNDEnMTQuMCJF!5e0!3m2!1sid!2sid!4v1752466060681!5m2!1sid!2sid"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <!-- Gambar Workshop -->
                    <div class="mt-4">
                        <h4 class="text-sm text-gray-600 font-semibold mb-2">Tampilan Workshop</h4>
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="/img/workshop.jpg" alt="Foto Workshop" class="w-full h-48 object-cover">
                        </div>
                    </div>
                </div>

                <!-- Lokasi 2: Kantor Pusat -->
                <div class="bg-stone-100 rounded-xl shadow-lg p-6 flex flex-col gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-red-600 mb-1">Kantor Pusat</h2>
                        <p class="text-gray-700 mb-3">
                            JL. Angkasa Kavling B-6, Mall MGK Kemayoran Lt. UG Blok C3.No. 3, Jakarta Pusat
                        </p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Mall+MGK+Kemayoran+Blok+C3+No+3+Jakarta+Pusat"
                            target="_blank"
                            class="inline-block bg-red-600 hover:bg-red-800 text-white px-4 py-2 rounded text-sm font-semibold transition">
                            Buka di Google Maps
                        </a>
                    </div>

                    <!-- Peta -->
                    <div>
                        <h4 class="text-sm text-gray-600 font-semibold mt-3 mb-2">Lihat Lokasi Kami</h4>
                        <div class="relative overflow-hidden rounded-lg shadow aspect-w-16 aspect-h-9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7933.643388155172!2d106.83992475271222!3d-6.1546300711381035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f50fa5ff8999%3A0xfe688bbd554362bb!2sMega%20Glodok%20Kemayoran!5e0!3m2!1sid!2sid!4v1752465818641!5m2!1sid!2sid"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <!-- Gambar Kantor -->
                    <div class="mt-4">
                        <h4 class="text-sm text-gray-600 font-semibold mb-2">Tampilan Kantor</h4>
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="/img/office/room.jpg" alt="Foto Kantor" class="w-full h-40 object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('footer')
        {{-- Footer --}}

        <footer class="bg-red-600 text-stone-100 pt-12 pb-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <!-- Kolom 1: Kontak Kami -->
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-4">Contact Us</h3>
                        <p class="mb-1">PT Mega Jaya Tekindo</p>
                        <p class="mb-1">JL. Angkasa Kavling B-6, Mall MGK Kemayoran Lt. UG Blok C3.No. 3,
                            Jakarta
                            Pusat</p>
                        <p class="mb-1">Telepon: +62 857-7523-0813</p>
                        <p class="mb-1">
                            Email: <a href="mailto:marketing@ptkmcl.com"
                                class="text-blue-400 hover:underline">MegaJayaTekindo@gmail.com</a>
                        </p>
                    </div>

                    <!-- Kolom 2: Media Sosial -->
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-4">Social Media/ Marketplace</h3>
                        <a href="https://instagram.com/williammarcelloSS" target="_blank" rel="noopener"
                            class="inline-block mt-2">
                            <img src="../img/socialmedia/instagram.png" alt="Instagram"
                                class="w-16 h-16 transition-transform transform hover:scale-110">
                        </a>
                        <a href="https://Tokopedia.com/megashop2019" target="_blank" rel="noopener"
                            class="inline-block mt-2">
                            <img src="../img/socialmedia/tokopedia.png" alt="Tokopedia"
                                class="w-14 h-16 transition-transform transform hover:scale-110">
                        </a>
                    </div>

                    <!-- Kolom 3: Links -->
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-4">Links</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="/home" class="hover:text-white text-blue-400">› Home</a></li>
                            <li><a href="#" class="hover:text-white text-blue-400">› Product</a></li>
                            <li><a href="/about" class="hover:text-white text-blue-400">› About Us</a></li>
                            <li><a href="/contact" class="hover:text-white text-blue-400">› Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Garis & Copyright -->
                <div class="mt-10 border-t border-stone-100 pt-6 text-center text-sm text-stone-100 font-bold">
                    © Copyright: All Rights Reserved PT Mega Jaya Tekindo 2025
                </div>
            </div>
        </footer>

        {{-- Akhir Footer --}}


    @endsection

    {{-- Render JS reCAPTCHA --}}
    {!! NoCaptcha::renderJs() !!}
