@extends('layouts.main')

@section('title', 'About Us - Mega Jaya Tekindo')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-screen overflow-hidden bg-black text-white">
        <!-- Background Layer -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-600 via-red-700 to-red-800 z-0"></div>

        <!-- Overlay Hitam untuk kontras teks -->
        <div class="absolute inset-0 bg-red bg-opacity-40 z-0"></div>

        <!-- Animasi Bola -->
        <!-- Bola kiri atas -->
        <div class="absolute top-6 left-6 w-16 h-16 sm:w-32 sm:h-32 bg-white bg-opacity-10 rounded-full animate-pulse z-0">
        </div>
        <!-- Bola tengah bawah judul, responsive -->
        <div
            class="absolute top-1/3 left-1/2 w-12 h-12 sm:w-24 sm:h-24 bg-white bg-opacity-10 rounded-full animate-bounce z-0 transform -translate-x-1/2">
        </div>
        <!-- Bola kanan bawah -->
        <div
            class="absolute bottom-8 right-6 w-14 h-14 sm:w-20 sm:h-20 bg-yellow-400 bg-opacity-20 rounded-full animate-ping z-0">
        </div>

        <!-- Konten Hero -->
        <div class="relative z-10 flex items-center justify-center h-full text-center px-4">
            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-white to-yellow-400 bg-clip-text text-transparent">
                        About Us Mega Jaya Tekindo
                    </span>
                </h1>
                <p class="text-lg md:text-2xl text-gray-200">
                    Menyediakan solusi pompa industri yang tangguh dengan keandalan dan semangat.
                </p>
                <div class="mt-8">
                    <a href="#our-about"
                        class="inline-flex items-center px-6 py-3 bg-white text-red-700 font-semibold rounded-full shadow hover:bg-yellow-400 active:bg-yellow-300 transition-all">
                        Scroll
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 animate-bounce z-10">
            <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center items-start">
                <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </section>

    {{-- About us Mega Jaya Tekindo --}}
    <section id="our-about" class="py-24 bg-white">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <!-- Kolom Kiri: Teks -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                        Tentang Kami <span class="text-red-600">Mega Jaya Tekindo</span>
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl">
                        Selamat datang di halaman resmi PT. Mega Jaya Tekindo, kami adalah perusahaan yang
                        bergerak di bidang penyediaan pompa industri dan layanan terkait untuk memenuhi kebutuhan
                        industri
                        Anda
                        Yang beroperasi lebih dari 15 Tahun.
                        Dengan pengalaman bertahun-tahun, kami telah menjadi mitra terpercaya dalam menyediakan solusi
                        pompa
                        industri berkualitas dan pelayanan yang handal untuk berbagai sektor industri di Indonesia.

                        PT. Mega Jaya Tekindo adalah perusahaan yang didedikasikan untuk menyediakan produk dan
                        layanan berkualitas tinggi dalam bidang pompa industri maupun bukan industri. Dengan staf yang
                        berpengalaman dan komitmen kami
                        untuk memberikan solusi terbaik, kami telah membangun reputasi yang kuat di pasar industri
                        Indonesia.
                    </p>
                </div>
                <!-- Kolom Kanan: Gambar -->
                <div class="flex justify-center">
                    <img src="{{ asset('img/aboutData1.png') }}" alt="Tentang Mega Jaya Tekindo"
                        class="rounded-2xl max-h-120 shadow-lg w-full max-w-xs sm:max-w-md md:max-w-md lg:max-w-lg object-cover" />
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section id="our-story" class="py-24 bg-gray-50">
        <div class="container mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-20">
                Our Journey in <span class="text-red-600">Industrial Solutions</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                Dari awal yang sederhana hingga menjadi distributor tepercaya untuk merek seperti Ebara, Torishima,
                Grundfos. serta mereka lainnya, Mega Jaya Tekindo terus membentuk industri dengan inovasi, komitmen, dan
                kepercayaan.
            </p>

            <div class="mt-12 flex flex-wrap justify-center gap-8">
                <div class="bg-red-100 p-6 rounded-xl w-60 shadow hover:shadow-lg transition">
                    <h3 class="text-2xl text-red-600 font-bold mb-2">15+</h3>
                    <p class="text-gray-700">Years of Experience</p>
                </div>
                <div class="bg-yellow-100 p-6 rounded-xl w-60 shadow hover:shadow-lg transition">
                    <h3 class="text-2xl text-yellow-400 font-bold mb-2">500+</h3>
                    <p class="text-gray-700">Completed Projects</p>
                </div>
            </div>



        </div>
    </section>

    <!-- Project Gallery -->
    <section class="py-24 bg-white" id="gallery">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-6">
                    Project <span class="text-red-600">Gallery</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Dokumentasi beberapa project terbaik Mega Jaya Tekindo di berbagai industri.
                </p>
            </div>

            @php
                $galleryImages = [
                    'ChillerPump.jpg',
                    'ChillerPump2.jpg',
                    'ChillerPump3.jpg',
                    'ChillerPump4.jpg',
                    'Hydrant.jpg',
                    'Hydrant2.jpg',
                    'Hydrant3.jpg',
                    'Hydrant4.jpg',
                    'Transfer.jpg',
                    'Transfer2.jpg',
                ];
            @endphp

            <!-- Alpine Modal Wrapper -->
            <div x-data="{ show: false, img: '' }">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach ($galleryImages as $img)
                        <div
                            class="relative overflow-hidden rounded-2xl shadow hover:shadow-lg transition-all duration-300 group">
                            <img src="{{ asset('img/galleryproject/' . $img) }}" alt="Project"
                                class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300 cursor-pointer"
                                @click="show = true; img = '{{ asset('img/galleryproject/' . $img) }}'">
                            <div
                                class="absolute inset-0 bg-red-600 bg-opacity-10 flex items-center justify-center opacity-0 group-hover:opacity-30 transition-opacity duration-300">
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Modal Fullscreen Mobile Only -->
                <div x-show="show" x-transition x-cloak @click.away="show = false"
                    class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center md:hidden">
                    <img :src="img" alt="Preview" class="max-w-full max-h-full rounded-lg shadow-lg"
                        @click="show = false">
                    <button @click="show = false"
                        class="absolute top-4 right-4 text-white text-3xl font-bold">&times;</button>
                </div>
            </div>
        </div>
    </section>



    <!-- Mission & Vision Section -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-gray-200 relative overflow-hidden">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-6">
                    Our <span class="text-red-600">Mission</span> & Vision
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Driving innovation and excellence in industrial pump solutions across Indonesia
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Mission -->
                <div class="bg-white p-8 rounded-3xl shadow-xl transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Our Mission</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        Menjadi mitra terpercaya dalam penyediaan solusi pompa industri yang inovatif, andal, dan
                        berkelanjutan di seluruh sektor industri nasional.
                    </p>
                </div>

                <!-- Vision -->
                <div class="bg-white p-8 rounded-3xl shadow-xl transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Our Vision</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        Menjadi penyedia solusi pompa industri terkemuka di Asia , yang dikenal karena inovasi,
                        keandalan, dan layanan pelanggan yang luar biasa.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Core Values Section -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-6">
                    Our <span class="text-red-600">Core Values</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Prinsip-prinsip yang memandu setiap keputusan dan tindakan yang kita ambil
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Integrity -->
                <div
                    class="group text-center p-8 rounded-3xl bg-gradient-to-br from-red-50 to-red-100 hover:from-red-100 hover:to-red-200 transition-all duration-300 transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">integritas</h3>
                    <p class="text-gray-600">Kami beroperasi dengan kejujuran, transparansi, dan standar etika yang teguh
                        dalam
                        semua
                        hubungan bisnis kami.</p>
                </div>

                <!-- Innovation -->
                <div
                    class="group text-center p-8 rounded-3xl bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 transition-all duration-300 transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Inovasi</h3>
                    <p class="text-gray-600">Kami terus mengeksplorasi teknologi dan solusi baru untuk menghadirkan sistem
                        pompa yang canggih.
                    </p>
                </div>

                <!-- Excellence -->
                <div
                    class="group text-center p-8 rounded-3xl bg-gradient-to-br from-yellow-100 to-yellow-200 hover:from-yellow-100 hover:to-yellow-200 transition-all duration-300 transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Kualitas</h3>
                    <p class="text-gray-600">Kami berusaha mencapai kesempurnaan dalam setiap proyek, memastikan standar
                        kualitas tertinggi dan kepuasan pelanggan.</p>
                </div>

                <!-- Partnership -->
                <div
                    class="group text-center p-8 rounded-3xl bg-gradient-to-br from-gray-100 to-gray-200 hover:from-gray-100 hover:to-gray-200 transition-all duration-300 transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-gray-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Kemitraan</h3>
                    <p class="text-gray-600">
                        Kami membangun hubungan jangka panjang dengan klien, pemasok, dan anggota tim kami berdasarkan
                        kepercayaan dan kesuksesan bersama.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-24 bg-gradient-to-br from-red-600 to-red-700 text-white relative overflow-hidden">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold mb-6">
                    Why Choose <span class="text-yellow-300">Mega Jaya Tekindo</span>
                </h2>
                <p class="text-xl text-red-100 max-w-3xl mx-auto">
                    Rasakan perbedaan yang dihasilkan oleh keahlian, inovasi, dan dedikasi
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <div class="text-center p-8 rounded-3xl bg-white bg-opacity-10 backdrop-blur-sm">
                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Years of Experience</h3>
                    <p class="text-gray-400">Lebih dari 15 tahun dalam memberikan solusi pompa yang dapat diandalkan di
                        berbagai industri di Indonesia.
                    </p>
                </div>

                <div class="text-center p-8 rounded-3xl bg-white bg-opacity-10 backdrop-blur-sm">
                    <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Expert Team</h3>
                    <p class="text-gray-400">Insinyur dan teknisi bersertifikat dengan pengetahuan industri yang mendalam
                    </p>
                </div>

                <div class="text-center p-8 rounded-3xl bg-white bg-opacity-10 backdrop-blur-sm">
                    <div class="w-16 h-16 bg-gray-400 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Innovation First</h3>
                    <p class="text-gray-400">Teknologi dan solusi mutakhir untuk tantangan industri modern</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="container mx-auto px-6 lg:px-8 text-center">
            <div>
                <h2 class="text-5xl font-bold text-gray-900 mb-6">
                    Ready to <span class="text-red-600">Transform</span> Your Operations?
                </h2>
                <p class="text-xl text-gray-600 mb-12 max-w-3xl mx-auto">
                    Mari diskusikan bagaimana solusi pompa kami dapat mengoptimalkan proses industri Anda dan mendorong
                    kesuksesan Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/produk"
                        class="inline-flex items-center px-8 py-4 bg-red-600 text-white font-semibold rounded-full hover:bg-red-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Explore Our Products
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="/contact"
                        class="inline-flex items-center px-8 py-4 border-2 border-red-600 text-red-600 font-semibold rounded-full hover:bg-red-600 hover:text-white focus:bg-red-600 focus:text-white transition-all duration-300">
                        Kontak Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- All Products Section -->
    <section class="py-24 bg-gray-50" id="all-products">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-6">
                    Semua <span class="text-red-600">Produk Kami</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Temukan berbagai solusi pompa industri terbaik dari Mega Jaya Tekindo
                </p>
            </div>
            <div
                class="flex overflow-x-auto gap-6 pb-4 sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:overflow-x-visible bg-white">
                @forelse($allProducts as $product)
                    <div
                        class="min-w-[220px] max-w-xs flex-shrink-0 mx-2 md:mx-0 rounded-xl shadow border-2 border-red-600 p-5 text-center bg-white">
                        @if ($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                class="object-contain rounded-xl max-h-[150px] mx-auto mb-3" />
                        @else
                            <img src="https://via.placeholder.com/200x200?text=No+Image" alt="{{ $product->name }}"
                                class="object-contain rounded-xl max-h-[150px] mx-auto mb-3" />
                        @endif
                        <div style="font-weight:bold; color:#b91c1c; margin-bottom:10px;">{{ $product->name }}</div>
                        @if ($product->type)
                            <a href="{{ route('produk.type.detail', ['brand' => Str::slug($product->brand), 'type' => $product->type]) }}"
                                class="inline-block px-5 py-2 bg-red-600 text-white rounded-full font-semibold mt-2 transition hover:bg-red-700">
                                Lihat Detail
                            </a>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center">
                        <div style="background:#e0e7ff; color:#3730a3; border-radius:8px; padding:20px;">Belum ada
                            produk
                            yang tersedia.</div>
                    </div>
                @endforelse
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
                    <a href="https://Tokopedia.com/megashop2019" target="_blank" rel="noopener"
                        class="inline-block mt-2">
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

    <style>
        /* Custom animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom gradients */
        .bg-gradient-radial {
            background: radial-gradient(circle, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 50%, transparent 100%);
        }
    </style>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

@endsection
