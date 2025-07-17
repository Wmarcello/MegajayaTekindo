@extends('layouts.main')

@section('title', $product ? $product->name . ' - Dual Impeller Centrifugal Pump' : 'Produk Tidak Ditemukan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{ tab: 'spesifikasi' }">
        @if ($product)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                {{-- Gambar Produk --}}
                <div x-data="{
                    images: [
                        '{{ asset('img/2cdx/2cdx.png') }}',
                        '{{ asset('img/2cdx/2cdx_pict2.png') }}'
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
                        <img :src="currentImage" alt="2CDX Main Image"
                            class="mx-auto max-h-[350px] object-contain mb-4 rounded  transition duration-300 ease-in-out">

                        {{-- Tombol Kiri --}}
                        <button @click="prev"
                            class="absolute z-1 top-1/2 left-0 -translate-y-1/2 text-black p-2 rounded-full shadow hover:bg-gray-200">
                            <i class="bi bi-chevron-left"></i>
                        </button>

                        {{-- Tombol Kanan --}}
                        <button @click="next"
                            class="absolute z-1 top-1/2 right-0 -translate-y-1/2 text-black p-2 rounded-full shadow hover:bg-gray-200">
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
                    <h1 class="text-3xl font-extrabold mb-2">2CDX - Dual Impeller Centrifugal Pump</h1>
                    <div class="w-10 h-1 bg-gray-300 mb-4"></div>

                    <h2 class="text-lg font-semibold mb-1">Fitur :</h2>
                    <p class="text-gray-700 mb-2">
                        Pompa listrik sentrifugal impeller ganda dengan bagian hidrolik dalam baja tahan karat AISI 304 dan
                        AISI 316
                    </p>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Struktur yang kuat</li>
                        <li>Dimensi kecil</li>
                    </ul>

                    <h2 class="text-lg font-semibold mb-1">Aplikasi :</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>Peningkatan tekanan domestik</li>
                        <li>Irigasi kebun skala kecil</li>
                        <li>Pencucian</li>
                        <li>Mengolah air</li>
                        <li>Menara pendingin</li>
                        <li>Memindahkan air bersih secara umum</li>
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
                    <img src="{{ asset('img/2cdx/dimension1.png') }}" alt="Spesifikasi 2CDX"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/2cdx/dimension.png') }}" alt="Spesifikasi Tambahan"
                        class="w-full max-w-2xl rounded shadow border mx-auto mt-10">
                </div>

                {{-- KATALOG --}}
                <div x-show="tab === 'katalog'" class="text-center space-y-4">
                    <img src="{{ asset('img/2cdx/2cdx.png') }}" alt="Katalog 2CDX"
                        class="mx-auto max-h-[250px] object-contain rounded shadow border">
                    <a href="{{ asset('pdf/2cdx_catalog.pdf') }}" download
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
