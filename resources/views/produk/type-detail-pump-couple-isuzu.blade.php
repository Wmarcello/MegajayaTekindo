@extends('layouts.main')

@section('title', $product ? $product->name . ' - Engine Isuzu 4JB Pump' : 'Produk Tidak Ditemukan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{
        pumpBrand: '',
        flowRate: '',
        head: '',
        tab: 'spesifikasi',
        get isValid() {
            return this.pumpBrand && this.flowRate && this.head;
        },
        get waMessage() {
            return `Halo MJT, saya tertarik dengan produk Pump Centrifugal Engine Isuzu 4JB dan ingin konsultasi dengan merek pompa ${this.pumpBrand}, kapasitas ${this.flowRate} m3/h, dan head ${this.head} meter.`;
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
                    <img src="{{ asset($product->image) }}" alt="Engine Isuzu Pump"
                        class="mx-auto max-h-[360px] object-contain rounded-lg shadow-lg border transition-transform hover:scale-105 duration-300 ease-in-out">
                </div>

                {{-- Detail Produk --}}
                <div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800 mb-2">Pump Centrifugal + Engine Isuzu 4JB
                        Series</h1>
                    <div class="w-14 h-1 bg-red-600 mb-5 rounded"></div>

                    <h2 class="text-lg font-bold text-gray-700 mb-2">Fitur Unggulan:</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Engine Diesel Isuzu 4JB1 performa tinggi</li>
                        <li>Konstruksi kopel langsung anti-getar</li>
                        <li>Efisiensi operasional & kemudahan servis</li>
                        <li>Siap digunakan di lokasi tanpa listrik</li>
                    </ul>

                    <h2 class="text-lg font-bold text-gray-700 mb-2">Aplikasi:</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Pengairan irigasi dan proyek konstruksi</li>
                        <li>Sistem drainase & distribusi air</li>
                        <li>Tambang dan remote industri</li>
                    </ul>

                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-800">Spesifikasi:</h3>
                        <p class="text-gray-700">{{ $product->specifications }}</p>
                    </div>

                    <div class="border-t border-red-500 my-6"></div>

                    {{-- Form Konsultasi --}}
                    <div class="space-y-4">
                        <div>
                            <label class="font-semibold">Pilih Merek Pompa:</label>
                            <select x-model="pumpBrand"
                                class="w-full mt-1 p-2 border rounded focus:ring-red-500 focus:border-red-500">
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
                                    class="w-full mt-1 p-2 border rounded focus:ring-red-500 focus:border-red-500"
                                    placeholder="Contoh: 180">
                            </div>
                            <div class="flex-1">
                                <label class="font-semibold">Head (m):</label>
                                <input type="number" x-model="head"
                                    class="w-full mt-1 p-2 border rounded focus:ring-red-500 focus:border-red-500"
                                    placeholder="Contoh: 75">
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
            <div class="mt-14">
                <div class="border-b border-gray-300 mb-4">
                    <nav class="flex space-x-6 text-sm font-semibold">
                        <button @click="tab = 'spesifikasi'"
                            :class="tab === 'spesifikasi' ? 'text-red-600 border-b-2 border-red-600' :
                                'text-gray-500 hover:text-red-600'"
                            class="pb-2 transition">
                            SPESIFIKASI
                        </button>
                        <button @click="tab = 'katalog'"
                            :class="tab === 'katalog' ? 'text-red-600 border-b-2 border-red-600' :
                                'text-gray-500 hover:text-red-600'"
                            class="pb-2 transition">
                            KATALOG
                        </button>
                    </nav>
                </div>

                {{-- SPESIFIKASI --}}
                <div x-show="tab === 'spesifikasi'" class="space-y-6">
                    <img src="{{ asset('img/cwIsuzu/specIsuzu.png') }}" alt="Spesifikasi Isuzu 4JB1"
                        class="w-full max-w-2xl rounded-lg shadow-md border mx-auto transition hover:scale-105">
                </div>

                {{-- KATALOG --}}
                <div x-show="tab === 'katalog'" class="text-center space-y-4 mt-6">
                    <img src="{{ asset('img/cwIsuzu/isuzu.png') }}" alt="Katalog Isuzu 4JB"
                        class="mx-auto max-h-[250px] object-contain rounded shadow-md border">
                    <a href="{{ asset('pdf/isuzu_4jb1t_Catalog.pdf') }}" download
                        class="inline-block px-6 py-2 bg-red-600 text-white font-semibold rounded-full hover:bg-red-700 shadow transition">
                        <i class="bi bi-download mr-2"></i>Unduh Katalog PDF
                    </a>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center py-6 text-lg font-semibold text-red-600">Produk tidak ditemukan.
            </div>
        @endif
    </div>
@endsection
