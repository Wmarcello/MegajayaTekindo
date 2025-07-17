@extends('layouts.main')

@section('title', 'Impeller Pompa EBARA')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Gambar & Deskripsi Atas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div>
                <img src="{{ asset('img/impeller/impellerEbara.png') }}" alt="Impeller Pompa EBARA"
                    class="rounded  w-[300px] max-w-lg mx-auto">
            </div>
            <div>
                <h1 class="text-3xl font-extrabold mb-2">IMPELLER POMPA EBARA</h1>
                <p class="text-gray-700 mb-4">
                    Impeller Pompa EBARA adalah salah satu komponen penting dari pompa Ebara, berfungsi sebagai
                    baling-baling
                    penggerak air. Dengan desain khusus, impeller memutar air dari as motor sehingga menciptakan dorongan
                    untuk menghasilkan tekanan (head) tertentu pada sistem. Kami menyediakan berbagai jenis impeller untuk
                    tipe-tipe pompa Ebara berikut:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Impeller Pompa Ebara CDX</li>
                    <li>Impeller Pompa Ebara 2CDX</li>
                    <li>Impeller Pompa Ebara DVS / DL / DS / DF / DML (Pompa Celup)</li>
                    <li>Impeller Pompa Ebara FSA</li>
                    <li>Impeller Pompa Ebara EVM / EVMSG</li>
                    <li>Impeller Pompa Ebara SQPB</li>
                    <li>Impeller Pompa Ebara 3D, 3S</li>
                </ul>


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



        {{-- Judul Deskripsi --}}
        <div class="mt-14" x-data="{ tab: 'deskripsi' }">
            <div class="border-b border-gray-200 mb-4">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <button @click="tab = 'deskripsi'"
                        :class="tab === 'deskripsi' ? 'border-red-600 text-red-600' :
                            'border-transparent text-gray-500 hover:text-gray-700'"
                        class="whitespace-nowrap pb-2 px-1 border-b-2 font-medium text-sm">
                        DESKRIPSI
                    </button>
                    <button @click="tab = 'type'"
                        :class="tab === 'type' ? 'border-red-600 text-red-600' :
                            'border-transparent text-gray-500 hover:text-gray-700'"
                        class="whitespace-nowrap pb-2 px-1 border-b-2 font-medium text-sm">
                        TYPE
                    </button>
                </nav>
            </div>
            {{-- Tab Content --}}
            <div x-show="tab === 'deskripsi'">
                <p class="text-gray-700 leading-relaxed mb-4">
                    Impeller Pompa EBARA merupakan komponen inti dalam sistem pompa yang dirancang dengan tingkat presisi
                    tinggi
                    menggunakan material <strong> Stainless Steel AISI 304 atau 316</strong>. Teknologi ini menjamin
                    efisiensi aliran maksimum,
                    serta daya tahan optimal terhadap korosi dan abrasi.
                </p>

                <p class="text-gray-700 leading-relaxed mb-4">
                    Setiap impeller tersedia dalam tipe tertutup, semi-terbuka, dan terbuka
                    penuh sesuai kebutuhan aplikasi,
                    mulai dari air bersih, cairan kimia ringan, hingga limbah industri. Hal ini membuat impeller
                    EBARA menjadi pilihan terbaik
                    untuk sistem pompa yang andal, tahan lama, dan minim perawatan.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Dengan desain hidrolik efisien dan performa stabil, impeller EBARA memberikan solusi sempurna bagi
                    industri,
                    bangunan komersial, maupun fasilitas air bersih skala besar.
                </p>
            </div>

            {{-- Konten Tab TYPE --}}
            <div x-show="tab === 'type'" class="mt-8">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    @php
                        $types = [
                            ['img' => 'img/impeller/impellerCdx.png', 'title' => 'CDX'],
                            ['img' => 'img/impeller/impeller2cdx.png', 'title' => '2CDX'],
                            ['img' => 'img/impeller/impellerDvs.png', 'title' => 'DVS / DL / DS / DF / DML'],
                            ['img' => 'img/impeller/impellerEbara.png', 'title' => 'FSA'],
                            ['img' => 'img/impeller/impellerEvms.png', 'title' => 'EVM / EVMSG'],
                            ['img' => 'img/impeller/impellerSqpb.png', 'title' => 'SQPB'],
                            ['img' => 'img/impeller/impeller2cdx.png', 'title' => '3D'],
                            ['img' => 'img/impeller/impeller3s.png', 'title' => '3S'],
                        ];
                    @endphp

                    @foreach ($types as $type)
                        <div
                            class="bg-white rounded-lg shadow-md overflow-hidden border hover:shadow-lg transition duration-300">
                            <img src="{{ asset($type['img']) }}" alt="{{ $type['title'] }}"
                                class="w-full h-28 object-contain bg-gray-100 p-2">
                            <div class="text-center py-2 font-semibold text-sm text-gray-700">
                                Impeller EBARA {{ $type['title'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
