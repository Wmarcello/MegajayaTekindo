@extends('layouts.main')

@section('title', 'Project - Mega Jaya Tekindo')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-cover bg-center bg-no-repeat text-white text-center"
        style="background-image: url('/img/galleryproject/ChillerPump3.jpg');">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10">
            <div class="container mx-auto px-6 lg:px-8">
                <h1 class="text-4xl md:text-4xl font-bold mb-4">Project <span class="text-yellow-300">Mega Jaya Tekindo</span>
                </h1>
                <p class="text-lg md:text-lg max-w-2xl mx-auto text-gray-100">
                    Menjadi mitra terpercaya dalam berbagai proyek industri di Indonesia, Mega Jaya Tekindo telah
                    berkontribusi
                    pada ratusan instalasi pompa dan sistem air di berbagai sektor.
                </p>
            </div>
        </div>
    </section>

    <!-- Project Gallery Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-yellow-400 mb-4">Galeri <span class="text-red-600">Project</span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Berikut adalah beberapa dokumentasi proyek terbaik yang telah kami selesaikan untuk klien-klien kami di
                    seluruh Indonesia.
                </p>
            </div>
            @php
                $projects = [
                    ['img' => 'ChillerPump.jpg', 'name' => 'Instalasi Chiller Pump Gedung Perkantoran'],
                    ['img' => 'Hydrant.jpg', 'name' => 'Sistem Pompa Hydrant Pabrik'],
                    ['img' => 'Transfer.jpg', 'name' => 'Pompa Transfer Air Industri'],
                    ['img' => 'ChillerPump2.jpg', 'name' => 'Upgrade Pompa Chiller Hotel'],
                    ['img' => 'Hydrant2.jpg', 'name' => 'Instalasi Hydrant Gedung Tinggi'],
                    ['img' => 'Transfer2.jpg', 'name' => 'Sistem Pompa Transfer Rumah Sakit'],
                    ['img' => 'ChillerPump3.jpg', 'name' => 'Proyek Chiller Pump Mall'],
                    ['img' => 'Hydrant3.jpg', 'name' => 'Hydrant Industri Kimia'],
                ];
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($projects as $project)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all">
                        <img src="{{ asset('img/galleryproject/' . $project['img']) }}" alt="{{ $project['name'] }}"
                            class="w-full h-48 object-cover">
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-red-700 mb-2">{{ $project['name'] }}</h3>
                            <p class="text-gray-600 text-sm">Mega Jaya Tekindo dipercaya untuk solusi pompa dan sistem air
                                yang handal.</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-200">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih <span class="text-red-600">Mega Jaya
                        Tekindo?</span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Kami berkomitmen memberikan hasil terbaik untuk setiap project yang kami tangani.
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow text-center flex flex-col items-center">
                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Pengalaman Teruji</h4>
                    <p class="text-gray-600 text-sm">Lebih dari 15 tahun di industri pompa dan sistem air.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow text-center flex flex-col items-center">
                    <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Teknologi Modern</h4>
                    <p class="text-gray-600 text-sm">Solusi pompa dengan teknologi terbaru dan efisiensi tinggi.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow text-center flex flex-col items-center">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Tim Profesional</h4>
                    <p class="text-gray-600 text-sm">Didukung oleh insinyur dan teknisi bersertifikat.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow text-center flex flex-col items-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Layanan Prima</h4>
                    <p class="text-gray-600 text-sm">Konsultasi, instalasi, dan purna jual yang responsif.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-white text-center">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="max-w-xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Siap Meningkatkan Project Anda?</h2>
                <p class="text-lg text-gray-600 mb-8">Hubungi tim Mega Jaya Tekindo untuk konsultasi gratis dan solusi
                    terbaik untuk kebutuhan pompa industri Anda.</p>
                <a href="/contact"
                    class="inline-block px-8 py-4 bg-red-600 text-white font-semibold rounded-full hover:bg-red-700 transition-all duration-300 shadow-lg">Hubungi
                    Kami</a>
            </div>
        </div>
    </section>

    {{-- Footer --}}

    <footer class="bg-red-600 text-stone-100 pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Kolom 1: Kontak Kami -->
                <div>
                    <h3 class="text-xl font-semibold text-white mb-4">Contact Us</h3>
                    <p class="mb-1">PT Mega Jaya Tekindo</p>
                    <p class="mb-1">JL. Angkasa Kavling B-6, Mall MGK Kemayoran Lt. UG Blok C3.No. 3, Jakarta
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
                        <img src="./img/socialmedia/instagram.png" alt="Instagram"
                            class="w-16 h-16 transition-transform transform hover:scale-110">
                    </a>
                    <a href="https://Tokopedia.com/megashop2019" target="_blank" rel="noopener" class="inline-block mt-2">
                        <img src="./img/socialmedia/tokopedia.png" alt="Tokopedia"
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
                        <li><a href="/contact" class="hover:text-white text-blue-400">› Contact Us</a></li>
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
