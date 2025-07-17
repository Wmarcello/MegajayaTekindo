@extends('layouts.main')

@section('title', 'Seal Kit Pompa EBARA CDX')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{ tab: 'spesifikasi' }">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
            {{-- Gambar Produk --}}
            <div x-data="{
                images: [
                    '{{ asset('img/sealkit/SealkitEbara.png') }}',
                    '{{ asset('img/sealkit/SealkitEbara2.png') }}'
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
                        class="absolute z-1 top-1/2 left-0 -translate-y-1/2 hover:bg-gray-200 text-black p-2 rounded-full shadow">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    {{-- Tombol Kanan --}}
                    <button @click="next"
                        class="absolute z-1 top-1/2 right-0 -translate-y-1/2 hover:bg-gray-200 text-black p-2 rounded-full shadow">
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

            <div>
                <h1 class="text-3xl font-extrabold mb-2">SEAL KIT POMPA EBARA CDX SERIES</h1>
                <p class="text-gray-700 mb-4">
                    Seal Kit Pompa EBARA CDX merupakan komponen penting untuk menjaga sistem pompa tetap kedap dan
                    mencegah
                    kebocoran pada poros pompa. Kami menyediakan berbagai jenis seal kit untuk seluruh varian pompa
                    EBARA
                    CDX.
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Seal Kit EBARA CDX 70 ~ 200 </li>
                    <li>Seal Kit EBARA CDXM 70 ~ 200</li>
                    <li>Seal Kit EBARA CD 70 ~ 200</li>
                    <li>Seal Kit EBARA CDM 70 ~ 200</li>
                </ul>

                {{-- WhatsApp Button --}}
                <div class="mt-4">
                    <a href="https://wa.me/6285775230813?text=Halo%20MJT,%20saya%20tertarik%20dengan%20Seal%20Kit%20EBARA%20CDX%20dan%20ingin%20konsultasi%20mengenai%20tipe%20yang%20sesuai%20dengan%20pompa%20saya."
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
                    Seal kit EBARA CDX terbuat dari material berkualitas seperti <strong>Carbon/Ceramic/NBR</strong> dan
                    tersedia juga opsi <strong>Viton, Silicon Carbide</strong> untuk kebutuhan suhu tinggi dan cairan
                    agresif.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Komponen dalam seal kit meliputi mechanical seal, O-ring, dan part pelengkap lain yang disesuaikan
                    untuk
                    tipe pompa EBARA CDX/CDXM dan CD/CDM tertentu. Fungsi utamanya adalah menjaga daya tahan dan kinerja
                    pompa tetap
                    optimal.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Seal kit kami cocok untuk aplikasi air bersih, industri makanan, HVAC, hingga proses industri ringan
                    lainnya. Selalu pastikan kompatibilitas tipe pompa saat melakukan pemesanan.
                </p>
            </div>
        </div>
    </div>

@endsection
