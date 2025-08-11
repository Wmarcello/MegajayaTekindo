@extends('layouts.main')

@section('title', $product ? $product->name . ' - Pump Couple Teco' : 'Produk Tidak Ditemukan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{
        pumpBrand: '',
        flowRate: '',
        head: '',
        pole: '',
        tab: 'spesifikasi',
        get isValid() {
            return this.pumpBrand && this.flowRate && this.head && this.pole;
        },
        get waMessage() {
            return `Halo MJT, saya tertarik dengan produk Pump Couple Teco dan ingin konsultasi mengenai kebutuhan saya dengan merek pompa ${this.pumpBrand}, kapasitas ${this.flowRate} m3/h, head ${this.head} meter, dan motor ${this.pole} pole.`;
        },
        resetForm() {
            this.pumpBrand = '';
            this.flowRate = '';
            this.head = '';
            this.pole = '';
        }
    }">
        @if ($product)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                {{-- Gambar Produk --}}
                <div class="text-center relative">
                    <img src="{{ asset($product->image) }}" alt="Pump Couple Teco"
                        class="mx-auto max-h-[350px] object-contain mb-4 transition duration-300 ease-in-out">
                </div>

                {{-- Detail Produk --}}
                <div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800 mb-2">Pump Centrifugal + Teco Electric</h1>
                    <div class="w-14 h-1 bg-red-600 mb-5 rounded"></div>

                    <h2 class="text-lg font-semibold mb-1">Fitur :</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Motor Teco handal dengan opsi kecepatan 2 Pole / 4 Pole</li>
                        <li>Koneksi fleksibel antar pompa dan motor</li>
                        <li>Konstruksi tangguh untuk lingkungan kerja yang berat</li>
                        <li>Performa optimal dengan konsumsi daya efisien</li>
                    </ul>

                    <h2 class="text-lg font-semibold mb-1">Aplikasi :</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>Instalasi air bersih, limbah, dan proses industri</li>
                        <li>Sistem tekanan air untuk bangunan dan fasilitas umum</li>
                        <li>Industri manufaktur dan utilitas</li>
                    </ul>


                    <div class="mt-4">
                        <b>Spesifikasi:</b>
                        <div>{{ $product->specifications }}</div>
                    </div>

                    <hr class="my-6 border-t border-red-600 mb-8 mt-6">

                    <div class="grid gap-4">
                        <div>
                            <label class="font-semibold">Pilih Merek Pompa:</label>
                            <select x-model="pumpBrand" class="w-full mt-1 p-2 border rounded">
                                <option value="">Pilih Merek</option>
                                <option value="EBARA">EBARA</option>
                                <option value="Torishima">Torishima</option>
                                <option value="KSB">KSB</option>
                                <option value="koshin">Koshin</option>
                                <option value="Other">Lainnya</option>
                            </select>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="flex-1">
                                <label class="font-semibold">Kapasitas (m3/h):</label>
                                <input type="number" x-model="flowRate" class="w-full mt-1 p-2 border rounded"
                                    placeholder="Contoh: 150">
                            </div>
                            <div class="flex-1/2">
                                <label class="font-semibold">Head (m):</label>
                                <input type="number" x-model="head" class="w-full mt-1 p-2 border rounded"
                                    placeholder="Contoh: 60">
                            </div>
                        </div>

                        <div>
                            <label class="font-semibold">Jumlah Pole Motor:</label>
                            <select x-model="pole" class="w-full mt-1 p-2 border rounded">
                                <option value="">Pilih Pole</option>
                                <option value="2">2 Pole</option>
                                <option value="4">4 Pole</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6">
                        <template x-if="isValid">
                            <a :href="`https://wa.me/6285775230813?text=${encodeURIComponent(waMessage)}`"
                                @click="resetForm()" target="_blank"
                                class="inline-flex items-center gap-2 px-5 py-3 bg-green-500 text-white font-semibold rounded-full shadow-md hover:bg-green-600 hover:shadow-lg transition duration-300 ease-in-out">
                                <i class="bi bi-whatsapp"></i>
                                Tanya via WhatsApp
                            </a>
                        </template>
                        <template x-if="!isValid">
                            <button disabled
                                class="inline-flex items-center gap-2 px-5 py-3 bg-gray-400 text-white font-semibold rounded-full shadow-md cursor-not-allowed">
                                <i class="bi bi-whatsapp"></i>
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
                        <button @click="tab = 'dimension'"
                            :class="tab === 'dimension' ? 'border-red-600 text-red-600' :
                                'border-transparent text-gray-500 hover:text-gray-700'"
                            class="whitespace-nowrap pb-2 px-1 border-b-2 font-medium text-sm">
                            DIMENSION
                        </button>
                    </nav>
                </div>

                {{-- SPESIFIKASI --}}
                <div x-show="tab === 'spesifikasi'" class="space-y-6">
                    <img src="{{ asset('img/cwSiemens/CentrifugalSiemens.png') }}" alt="Spesifikasi"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/Teco/tecokw.png') }}" alt="Spesifikasi TECO AE-VS"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/Teco/tecokw2.png') }}" alt="Spesifikasi Tambahan"
                        class="w-full max-w-2xl rounded shadow border mx-auto mt-10">
                </div>

                {{-- DIMENSION --}}
                <div x-show="tab === 'dimension'" class="space-y-6">
                    <img src="{{ asset('img/cwTeco/b3Teco.png') }}" alt="dimension"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/cwTeco/b35Teco.png') }}" alt="dimension"
                        class="w-full max-w-2xl rounded shadow border mx-auto">
                    <img src="{{ asset('img/cwTeco/v1Teco.png') }}" alt="dimension"
                        class="w-full max-w-2xl rounded shadow border mx-auto">

                </div>
            </div>
        @else
            <div class="alert alert-warning">Produk tidak ditemukan.</div>
        @endif
    </div>
@endsection
