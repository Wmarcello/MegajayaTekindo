@extends('layouts.main')

@section('title', 'Produk ' . $brandDisplay)

@php use Illuminate\Support\Str; @endphp

@section('content')
    <div class="container mx-auto py-5 flex flex-col items-center">
        <!-- Header Brand -->
        <div class="mb-5 text-center bg-red-600 py-4 shadow-sm w-full">
            <h1 class="text-white text-5xl font-bold tracking-widest mb-0 uppercase">{{ $brandDisplay }}</h1>
        </div>


        <!-- Produk -->
        @if ($products->count() === 1)
            <div class="flex justify-center w-full">
                @foreach ($products as $product)
                    <div
                        class="flex flex-col justify-between items-center bg-white rounded-xl shadow p-5 w-full max-w-xs min-h-[400px] text-center mt-10">
                        <div class="flex flex-col items-center flex-grow w-full mt-5">
                            <div class="flex justify-center items-center mb-3 w-full h-[200px]">
                                @if ($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                        class="object-contain rounded-xl max-h-[170px] mx-auto" />
                                @else
                                    <img src="https://via.placeholder.com/200x200?text=No+Image" alt="{{ $product->name }}"
                                        class="object-contain rounded-xl max-h-[170px] mx-auto" />
                                @endif
                            </div>
                            <h5 class="font-bold mb-2 text-center w-full">{{ $product->name }}</h5>
                        </div>
                        @if ($product->type)
                            <a href="{{ route('produk.type.detail', ['brand' => Str::slug($product->brand), 'type' => $product->type]) }}"
                                x-data="{ clicked: false }"
                                @click="if(clicked){ $event.preventDefault(); } else { clicked = true; }"
                                :class="{ 'opacity-50 pointer-events-none': clicked }"
                                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mx-auto block mt-2 w-full transition duration-200 text-center">
                                {{ strtoupper(str_replace('-', ' ', $product->type)) }}
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 m-5 p-5 gap-8 text-center justify-center">
                @forelse ($products as $product)
                    <div class="flex justify-center">
                        <div
                            class="flex flex-col justify-between m-auto items-center bg-white rounded-xl shadow p-5 w-full max-w-xs min-h-[400px] text-center">
                            <div class="flex flex-col items-center flex-grow w-full">
                                <div class="flex justify-center items-center mb-3 w-full h-[200px]">
                                    @if ($product->image)
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                            class="object-contain rounded-xl max-h-[170px] mx-auto" />
                                    @else
                                        <img src="https://via.placeholder.com/200x200?text=No+Image"
                                            alt="{{ $product->name }}"
                                            class="object-contain rounded-xl max-h-[170px] mx-auto" />
                                    @endif
                                </div>
                                <h5 class="font-bold mb-2 text-center w-full">{{ $product->name }}</h5>
                            </div>
                            @if ($product->type)
                                <a href="{{ route('produk.type.detail', ['brand' => Str::slug($product->brand), 'type' => $product->type]) }}"
                                    x-data="{ clicked: false }"
                                    @click="if(clicked){ $event.preventDefault(); } else { clicked = true; }"
                                    :class="{ 'opacity-50 pointer-events-none': clicked }" class="block w-full">
                                    <button type="button"
                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mx-auto block mt-2 w-full transition duration-200">
                                        {{ strtoupper(str_replace('-', ' ', $product->type)) }}
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center">
                        <div class="bg-blue-100 text-blue-800 rounded p-4">Tidak ada produk untuk brand ini.</div>
                    </div>
                @endforelse
            </div>
        @endif

        <!-- Pagination -->
        <div class="flex justify-center mt-4 w-full">
            {{ $products->links() }}
        </div>
    </div>

    <style>
        .card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('footer')
    {{-- Footer --}}

    <footer class="bg-red-600 text-stone-100 pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Kolom 1: Kontak Kami -->
                <div>
                    <h3 class="text-xl font-semibold text-white mb-4">Contact Us</h3>
                    <p class="mb-1">PT Mega Jaya Tekindo</p>
                    <p class="mb-1">JL. Angkasa Kavling B-6, Mall MGK Kemayoran Lt. UG Blok C3.No. 3,
                        Jakarta
                        Pusat</p>
                    <p class="mb-1">Telepon: +62 857-7523-0813</p>
                    <p class="mb-1">
                        Email: <a href="mailto:marketing@ptkmcl.com"
                            class="text-blue-400 hover:underline">MegaJayaTekindo@gmail.com</a>
                    </p>
                </div>

                <!-- Kolom 2: Media Sosial -->
                <div>
                    <h3 class="text-xl font-semibold text-white mb-4">Social Media/ Marketplace</h3>
                    <a href="https://instagram.com/williammarcelloSS" target="_blank" rel="noopener"
                        class="inline-block mt-2">
                        <img src="../img/socialmedia/instagram.png" alt="Instagram"
                            class="w-16 h-16 transition-transform transform hover:scale-110">
                    </a>
                    <a href="https://Tokopedia.com/megashop2019" target="_blank" rel="noopener" class="inline-block mt-2">
                        <img src="../img/socialmedia/tokopedia.png" alt="Tokopedia"
                            class="w-14 h-16 transition-transform transform hover:scale-110">
                    </a>
                </div>

                <!-- Kolom 3: Links -->
                <div>
                    <h3 class="text-xl font-semibold text-white mb-4">Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/home" class="hover:text-white text-blue-400">› Home</a></li>
                        <li><a href="#" class="hover:text-white text-blue-400">› Product</a></li>
                        <li><a href="/about" class="hover:text-white text-blue-400">› About Us</a></li>
                        <li><a href="/contact" class="hover:text-white text-blue-400">› Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Garis & Copyright -->
            <div class="mt-10 border-t border-stone-100 pt-6 text-center text-sm text-stone-100 font-bold">
                © Copyright: All Rights Reserved PT Mega Jaya Tekindo 2025
            </div>
        </div>
    </footer>

    {{-- Akhir Footer --}}


@endsection
