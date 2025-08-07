@extends('layouts.main')

@section('title', $product ? $product->name . ' - CNP CDL/CDF Series' : 'Produk Tidak Ditemukan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{ tab: 'spesifikasi' }">
        @if ($product)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                {{-- Gambar Produk --}}
                <div x-data="{
                    images: [
                        '{{ asset('img/cnp/cdl_cdf_2.png') }}',
                        '{{ asset('img/cnp/cdl_cdf.png') }}'
                    ],
                    currentIndex: 0,
                    get currentImage() {
                        return this.images[this.currentIndex];
                    },
                    next() {
                        this.currentIndex = (this.currentIndex + 1) % this.images.length;
                    },
                    prev() {
                        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                    },
                    select(index) {
                        this.currentIndex = index;
                    }
                }" class="text-center relative">

                    {{-- Gambar Utama --}}
                    <div class="relative">
                        <img :src="currentImage" alt="CNP CDL/CDF Image"
                            class="mx-auto max-h-[350px] object-contain mb-4 rounded transition duration-300 ease-in-out">

                        {{-- Tombol Kiri --}}
                        <button @click="prev"
                            class="absolute top-1/2 left-0 -translate-y-1/2 text-black p-2 rounded-full shadow hover:bg-gray-200">
                            <i class="bi bi-chevron-left"></i>
                        </button>

                        {{-- Tombol Kanan --}}
                        <button @click="next"
                            class="absolute top-1/2 right-0 -translate-y-1/2 text-black p-2 rounded-full shadow hover:bg-gray-200">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>

                    {{-- Thumbnail --}}
                    <div class="flex justify-center gap-4 mt-4">
                        <template x-for="(img, index) in images" :key="index">
                            <img :src="img" @click="select(index)"
                                :class="index === currentIndex ? 'border-3 border-red-600' : 'border'"
                                class="w-20 h-20 object-contain cursor-pointer rounded transition duration-200">
                        </template>
                    </div>
                </div>

                {{-- Detail Produk --}}
                <div>
                    <h1 class="text-3xl font-extrabold mb-2">CNP CDL/CDF Series</h1>
                    <div class="w-10 h-1 bg-red-600 mb-4"></div>

                    <h2 class="text-lg font-semibold mb-1">Fitur :</h2>
                    <p class="text-gray-700 mb-2">
                        Pompa vertikal multistage berkualitas tinggi, efisien, dan tahan lama, cocok untuk berbagai aplikasi
                        industri dan domestik.
                    </p>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Desain kompak dan efisien</li>
                        <li>Konstruksi baja tahan karat</li>
                        <li>Tekanan tinggi dengan footprint kecil</li>
                    </ul>

                    <h2 class="text-lg font-semibold mb-1">Aplikasi :</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>Sistem suplai air</li>
                        <li>Booster dan transfer air bertekanan</li>
                        <li>Pemurnian dan pengolahan air</li>
                        <li>Sistem HVAC</li>
                        <li>Aplikasi industri umum</li>
                    </ul>

                    <div class="mt-4">
                        <b>Spesifikasi:</b>
                        <div>{{ $product->specifications }}</div>
                    </div>

                    {{-- WhatsApp Button --}}
                    <div class="mt-4">
                        <a href="https://wa.me/6285775230813?text=Halo%20MJT,%20saya%20tertarik%20dengan%20produk%20{{ $product->name }}%20dan%20ingin%20tanya%20tentang%20spesifikasi%20yang%20saya%20butuhkan%20pakai%20tipe%20apa"
                            target="_blank"
                            class="inline-flex items-center gap-2 px-5 py-3 mt-6 bg-green-500 text-white font-semibold rounded-full shadow-md hover:bg-green-600 hover:shadow-lg transition duration-300 ease-in-out">
                            <i class="bi bi-whatsapp"></i>
                            Tanya via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            {{-- Tabs --}}
            <div class="mt-10">
                <div class="border-b border-gray-200 mb-4">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button @click="tab = 'spesifikasi'"
                            :class="tab === 'spesifikasi' ? 'border-red-600 text-red-600' :
                                'border-transparent text-gray-500 hover:text-gray-700'"
                            class="whitespace-nowrap pb-2 px-1 border-b-2 font-medium text-sm">
                            SPESIFIKASI
                        </button>
                        <button @click="tab = 'katalog'"
                            :class="tab === 'katalog' ? 'border-red-600 text-red-600' :
                                'border-transparent text-gray-500 hover:text-gray-700'"
                            class="whitespace-nowrap pb-2 px-1 border-b-2 font-medium text-sm">
                            KATALOG
                        </button>
                    </nav>
                </div>

                {{-- SPESIFIKASI --}}
                <div x-show="tab === 'spesifikasi'" class="space-y-6">
                    <img src="{{ asset('img/cnp/curve_cnp.png') }}" alt="Dimensi CDL/CDF"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/cnp/dimension_cnp.png') }}" alt="Dimensi Tambahan CDL/CDF"
                        class="w-full max-w-2xl rounded shadow border mx-auto mt-10">
                </div>

                {{-- KATALOG --}}
                <div x-show="tab === 'katalog'" class="text-center space-y-4">
                    <img src="{{ asset('img/cnp/cdl_cdf_2.png') }}" alt="Katalog CDL/CDF"
                        class="mx-auto max-h-[250px] object-contain rounded shadow border">
                    <a href="{{ asset('pdf/CNP_cdl_cdf_Catalog.pdf') }}" download
                        class="inline-block px-6 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 transition">
                        Download PDF Katalog
                    </a>
                </div>
            </div>
        @else
            <div class="alert alert-warning">Produk tidak ditemukan.</div>
        @endif
    </div>
@endsection
