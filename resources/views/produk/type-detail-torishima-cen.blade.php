@extends('layouts.main')

@section('title', $product ? $product->name . ' - Torishima CEN End Suction Pump' : 'Produk Tidak Ditemukan')

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
                    <h1 class="text-3xl font-extrabold mb-2">TORISHIMA CEN - END SUCTION PUMP</h1>
                    <div class="w-10 h-1 bg-gray-300 mb-4"></div>

                    <h2 class="text-lg font-semibold mb-1">Fitur Utama :</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Desain end suction sesuai standar ISO 2858</li>
                        <li>Efisiensi tinggi dan konsumsi daya rendah</li>
                        <li>Back pull-out untuk memudahkan perawatan</li>
                        <li>Material tersedia untuk aplikasi industri ringan hingga berat</li>
                    </ul>

                    <h2 class="text-lg font-semibold mb-1">Aplikasi :</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>Pabrik pengolahan air & wastewater</li>
                        <li>Sistem HVAC dan pendingin industri</li>
                        <li>Distribusi air bersih & booster system</li>
                        <li>Industri kimia, petrokimia, dan makanan</li>
                    </ul>

                    <div class="mt-4">
                        <b>Spesifikasi:</b>
                        <div>{{ $product->specifications }}</div>
                    </div>

                    {{-- WhatsApp Button --}}
                    <div class="mt-4">
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20mau%20tanya%20tentang%20{{ $product->name }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 px-5 py-3 mt-6 bg-green-500 text-white font-semibold rounded-full shadow-md hover:bg-green-600 hover:shadow-lg transition duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 32 32">
                                <path
                                    d="M16.001 2.667c-7.333 0-13.333 6-13.333 13.333 0 2.368.625 4.601 1.801 6.585l-1.9 6.383 6.553-1.881c1.896 1.036 4.045 1.58 6.238 1.58 7.333 0 13.333-6 13.333-13.333s-6-13.334-13.334-13.334zM16 24c-1.876 0-3.711-.499-5.316-1.443l-.381-.225-3.888 1.116 1.158-3.892-.248-.4C6.207 17.46 5.667 15.75 5.667 14c0-5.666 4.667-10.333 10.333-10.333 5.667 0 10.334 4.667 10.334 10.333 0 5.667-4.667 10.334-10.334 10.334zM21.42 18.476c-.292-.146-1.73-.856-1.997-.953-.266-.098-.46-.146-.654.146s-.748.953-.917 1.15c-.168.195-.337.219-.629.073-.293-.146-1.237-.456-2.357-1.454-.872-.778-1.461-1.737-1.632-2.029-.17-.293-.018-.45.128-.595.132-.13.292-.337.439-.506.147-.17.196-.293.293-.488.097-.195.048-.366-.024-.512-.073-.146-.653-1.579-.894-2.167-.235-.566-.472-.49-.653-.5-.168-.006-.365-.007-.561-.007s-.512.073-.78.366c-.268.293-1.025 1.001-1.025 2.439 0 1.438 1.051 2.826 1.196 3.02.146.195 2.071 3.17 5.021 4.442.702.303 1.25.484 1.676.619.704.224 1.344.193 1.85.117.565-.084 1.73-.707 1.975-1.388.244-.682.244-1.267.17-1.388-.073-.121-.267-.194-.56-.341z" />
                            </svg>
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
                    <img src="{{ asset('img/cen/curvecen.png') }}" alt="Spesifikasi Torishima CEN"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/cen/curvecen2.png') }}" alt="Spesifikasi Tambahan"
                        class="w-full max-w-2xl rounded shadow border mx-auto mt-10">
                </div>

                {{-- KATALOG --}}
                <div x-show="tab === 'katalog'" class="text-center space-y-4">
                    <img src="{{ asset('img/cen/cen.png') }}" alt="Katalog Torishima CEN"
                        class="mx-auto max-h-[250px] object-contain rounded shadow border">
                    <a href="{{ asset('pdf/TORISHIMA_CEN.pdf') }}" download
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
