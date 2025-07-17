@extends('layouts.main')

@section('title', $product ? $product->name . ' - ISUZU 4JB1T Diesel Engine' : 'Produk Tidak Ditemukan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{ tab: 'spesifikasi' }">
        @if ($product)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                {{-- Gambar Produk --}}
                <div class="text-center">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                        class="mx-auto max-h-[350px] object-contain mb-4">
                    <div class="inline-block border border-gray-300 p-1">
                        <img src="{{ asset($product->image) }}" alt="Thumbnail" class="w-16 h-auto object-contain">
                    </div>
                </div>

                {{-- Detail Produk --}}
                <div>
                    <h1 class="text-3xl font-extrabold mb-2">ISUZU 4JB1T - DIESEL ENGINE</h1>
                    <div class="w-10 h-1 bg-gray-300 mb-4"></div>

                    <h2 class="text-lg font-semibold mb-1">Fitur Unggulan :</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Mesin diesel 4 silinder turbocharged yang handal</li>
                        <li>Konsumsi bahan bakar yang efisien</li>
                        <li>Konstruksi kuat dan tahan lama untuk penggunaan berat</li>
                        <li>Dukungan suku cadang melimpah dan mudah ditemukan</li>
                    </ul>

                    <h2 class="text-lg font-semibold mb-1">Aplikasi :</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>Pompa industri dan irigasi</li>
                        <li>Genset dan peralatan pertanian</li>
                        <li>Mobil niaga, dump truck, dan pickup</li>
                        <li>Marine & alat berat konstruksi</li>
                    </ul>

                    <div class="mt-4">
                        <b>Spesifikasi:</b>
                        <div>{{ $product->specifications }}</div>
                    </div>

                    {{-- WhatsApp Button --}}
                    <div class="mt-4">
                        <a href="https://wa.me/6285775230813?text=Halo%20MJT,%20saya%20tertarik%20dengan%20produk%20{{ $product->name }}%20dan%20ingin%20konsultasi%20mengenai%20spesifikasi%20yang%20saya%20butuhkan%20sebaiknya%20menggunakan%20tipe%20apa.
"
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
                    <img src="{{ asset('img/isuzu/spec1.png') }}" alt="Spesifikasi ISUZU 4JB1T"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/isuzu/spec2.png') }}" alt="Spesifikasi Tambahan"
                        class="w-full max-w-2xl rounded shadow border mx-auto mt-10">
                </div>

                {{-- KATALOG --}}
                <div x-show="tab === 'katalog'" class="text-center space-y-4">
                    <img src="{{ asset('img/isuzu/4jb1t.png') }}" alt="Katalog ISUZU 4JB1T"
                        class="mx-auto max-h-[250px] object-contain rounded shadow border">
                    <a href="{{ asset('pdf/isuzu_4jb1t_Catalog.pdf') }}" download
                        class="inline-block px-6 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 transition">
                        Download Katalog PDF
                    </a>
                </div>
            </div>
        @else
            <div class="alert alert-warning">Produk tidak ditemukan.</div>
        @endif
    </div>
@endsection
