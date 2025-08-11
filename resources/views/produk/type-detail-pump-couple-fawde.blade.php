@extends('layouts.main')

@section('title', $product ? $product->name . ' - Pump Couple Engine FAWDE Series' : 'Produk Tidak Ditemukan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{
        pumpBrand: '',
        flowRate: '',
        head: '',
        tab: 'overview',
        get isValid() {
            return this.pumpBrand && this.flowRate && this.head;
        },
        get waMessage() {
            return `Halo MJT, saya tertarik dengan produk Pump Centrifugal Engine FAWDE dan ingin konsultasi dengan merek pompa ${this.pumpBrand}, kapasitas ${this.flowRate} m3/h, dan head ${this.head} meter.`;
        },
        resetForm() {
            this.pumpBrand = '';
            this.flowRate = '';
            this.head = '';
        }
    }">
        @if ($product)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                {{-- Gambar Produk --}}
                <div class="text-center">
                    <img src="{{ asset($product->image) }}" alt="Pump Engine FAWDE"
                        class="mx-auto max-h-[400px] object-contain rounded-xl transition-transform hover:scale-105 duration-300 ease-in-out">
                </div>

                {{-- Detail Produk --}}
                <div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-3">Pump Centrifugal with FAWDE Diesel
                        Engine</h1>
                    <div class="w-12 h-1 bg-red-600 mb-4 rounded"></div>

                    <h2 class="text-lg font-bold text-gray-700 mb-2">Keunggulan Produk:</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Engine FAWDE berstandar internasional</li>
                        <li>Pompa sentrifugal langsung dikopel dengan engine</li>
                        <li>Efisien bahan bakar dan performa stabil</li>
                        <li>Dukungan suku cadang luas di Indonesia</li>
                    </ul>

                    <h2 class="text-lg font-bold text-gray-700 mb-2">Aplikasi:</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Proyek irigasi dan infrastruktur</li>
                        <li>Pertambangan dan aplikasi berat</li>
                        <li>Industri air dan limbah</li>
                    </ul>

                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-800">Spesifikasi:</h3>
                        <p class="text-gray-700">{{ $product->specifications }}</p>
                    </div>

                    <div class="border-t border-red-600 mb-8 mt-6"></div>

                    {{-- Form Konsultasi --}}
                    <div class="space-y-4">
                        <div>
                            <label class="font-semibold">Pilih Merek Pompa:</label>
                            <select x-model="pumpBrand"
                                class="w-full mt-1 p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Merek</option>
                                <option value="EBARA">EBARA</option>
                                <option value="Torishima">Torishima</option>
                                <option value="KSB">KSB</option>
                                <option value="Other">Lainnya</option>
                            </select>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="flex-1">
                                <label class="font-semibold">Kapasitas (m3/h):</label>
                                <input type="number" x-model="flowRate"
                                    class="w-full mt-1 p-2 border rounded focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: 200">
                            </div>
                            <div class="flex-1">
                                <label class="font-semibold">Head (m):</label>
                                <input type="number" x-model="head"
                                    class="w-full mt-1 p-2 border rounded focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: 80">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <template x-if="isValid">
                            <a :href="`https://wa.me/6285775230813?text=${encodeURIComponent(waMessage)}`"
                                @click="resetForm()" target="_blank"
                                class="inline-flex items-center gap-2 px-5 py-3 bg-green-600 text-white font-semibold rounded-full shadow hover:bg-green-700 hover:shadow-lg transition">
                                <i class="bi bi-whatsapp text-lg"></i>
                                Konsultasi via WhatsApp
                            </a>
                        </template>
                        <template x-if="!isValid">
                            <button disabled
                                class="inline-flex items-center gap-2 px-5 py-3 bg-gray-400 text-white font-semibold rounded-full shadow cursor-not-allowed">
                                <i class="bi bi-whatsapp text-lg"></i>
                                Lengkapi Form Terlebih Dahulu
                            </button>
                        </template>
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
                    <img src="{{ asset('img/fawde/curve.png') }}" alt="Dimensi Tival FF4"
                        class="w-full max-w-2xl rounded shadow border mx-auto mt-10">
                    <img src="{{ asset('img/fawde/curve2.png') }}" alt="Dimensi Tival FF4"
                        class="w-full max-w-2xl rounded shadow border mx-auto mt-10">
                </div>

                {{-- KATALOG --}}
                <div x-show="tab === 'katalog'" class="text-center space-y-4">
                    <img src="{{ asset('img/cwFawde/fawdex.png') }}" alt="Katalog Tival FF4"
                        class="mx-auto max-h-[250px] object-contain rounded shadow border">
                    <a href="{{ asset('pdf/fawde_Catalog.pdf') }}" download
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
