@extends('layouts.main')

@section('title', $product ? $product->name . ' - SQPB Self Priming Pump' : 'Produk Tidak Ditemukan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{ tab: 'spesifikasi' }">
        @if ($product)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                <div class="text-center">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                        class="mx-auto max-h-[350px] object-contain mb-4">
                    <div class="inline-block border border-gray-300 p-1">
                        <img src="{{ asset($product->image) }}" alt="Thumbnail" class="w-16 h-auto object-contain">
                    </div>
                </div>

                <div>
                    <h1 class="text-3xl font-extrabold mb-2">EBARA SQPB - SELF PRIMING PUMP</h1>
                    <div class="w-10 h-1 bg-gray-300 mb-4"></div>

                    <h2 class="text-lg font-semibold mb-1">Fitur :</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Tidak memerlukan priming sebelum pemakaian (kecuali saat pertama kali)</li>
                        <li>Desain casing khusus untuk kemampuan priming cepat dan pemipaan jarak jauh</li>
                        <li>Dapat menangani cairan yang mengandung sedikit pasir atau lumpur</li>
                        <li>Menggunakan impeller semi-open untuk mengurangi risiko tersumbat</li>
                        <li>Mudah diinstalasi dengan mesin penggerak via karet belt (rotasi berlawanan jarum jam)</li>
                    </ul>

                    <h2 class="text-lg font-semibold mb-1">Aplikasi :</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>Pemompaan air berlumpur dari sumur terbuka atau kolam</li>
                        <li>Irigasi sawah dan pertanian</li>
                        <li>Pengurasan air limbah ringan</li>
                        <li>Aplikasi umum untuk sektor pertanian & konstruksi</li>
                    </ul>

                    <div class="mt-4">
                        <b>Spesifikasi:</b>
                        <div>{{ $product->specifications }}</div>
                    </div>

                    <div class="mt-4">
                        <a href="https://wa.me/6285775230813?text=Halo%20MJT,%20saya%20tertarik%20dengan%20produk%20{{ $product->name }}%20dan%20ingin%20konsultasi%20mengenai%20spesifikasi%20yang%20saya%20butuhkan%20sebaiknya%20menggunakan%20tipe%20apa."
                            target="_blank"
                            class="inline-flex items-center gap-2 px-5 py-3 mt-6 bg-green-500 text-white font-semibold rounded-full shadow-md hover:bg-green-600 hover:shadow-lg transition duration-300 ease-in-out">
                            <i class="bi bi-whatsapp"></i>
                            Tanya via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

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

                <div x-show="tab === 'spesifikasi'" class="space-y-6">
                    <img src="{{ asset('img/sqpb/dimension.png') }}" alt="Spesifikasi SQPB"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/sqpb/curve.png') }}" alt="Spesifikasi SQPB"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/sqpb/curve2.png') }}" alt="Spesifikasi SQPB"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                </div>

                <div x-show="tab === 'katalog'" class="text-center space-y-4">
                    <img src="{{ asset('img/sqpb/sqpb.png') }}" alt="Katalog SQPB"
                        class="mx-auto max-h-[250px] object-contain rounded shadow border">
                    <a href="{{ asset('pdf/Sqpb_Catalog.pdf') }}" download
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
