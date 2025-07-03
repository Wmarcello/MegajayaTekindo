<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 overflow-x-hidden">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    {{-- Akhir Bootstrap Icon --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <!-- AOS effek-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- Akhir AOS --}}

    <title> Navbar Project MJT</title>

</head>


<body class="min-h-screen scroll-smooth overflow-x-hidden">

    <div class="min-h-full">
        <nav class="bg-stone-100" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex flex-1 items-center justify-between">
                        <div class="shrink-0">
                            <img class="h-8 w-auto" src="{{ asset('img/logomjt.png') }}" alt="Logo">
                        </div>
                        <div class="hidden md:flex flex-1 justify-center">
                            <div class="ml-10 flex items-baseline space-x-8">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-800 hover:bg-gray-700 hover:text-white" -->
                                <a href="/home"
                                    class="rounded-md px-3 py-2 text-sm font-bold text-gray-800 hover:bg-red-600 hover:text-white">Home</a>
                                <a href="/about"
                                    class="rounded-md px-3 py-2 text-sm font-bold text-gray-800 hover:bg-red-600 hover:text-white ">About</a>
                                {{-- Product Menu --}}

                                <div class="relative group">
                                    <a href="#"
                                        class="rounded-md px-3 py-2 text-sm font-bold text-gray-800 hover:bg-red-600 hover:text-white">
                                        Product
                                    </a>
                                    <div
                                        class="absolute left-1/2 -translate-x-1/2 mt-2 z-50 hidden group-hover:flex w-[900px] bg-white shadow-lg p-6 rounded-md border border-gray-200 justify-between text-sm">
                                        <div class="grid grid-cols-6 gap-8 w-full">
                                            @foreach ($categories ?? [] as $category)
                                                <div>
                                                    <h4 class="font-bold mb-2">{{ $category->name }}</h4>
                                                    <ul class="space-y-1">
                                                        @foreach ($category->products as $product)
                                                            <li>
                                                                <a href="{{ route('produk.brand', ['brand' => Str::slug($product->brand)]) }}"
                                                                    class="hover:underline">
                                                                    {{ $product->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                {{-- End Product Menu --}}

                                <a href="/project"
                                    class="rounded-md px-3 py-2 text-sm font-bold text-gray-800 hover:bg-red-600 hover:text-white">Project</a>
                                <a href="/contact"
                                    class="rounded-md px-3 py-2 text-sm font-bold text-gray-800 hover:bg-red-600 hover:text-white">Contact</a>

                                <form action="{{ route('products.index') }}" method="GET" class="flex items-center">
                                    <input type="text" name="search" placeholder="Cari produk..."
                                        value="{{ $search ?? '' }}" class="border rounded px-2 py-1 text-sm" />
                                    <button type="submit"
                                        class="ml-2 px-3 py-1 bg-red-600 text-white rounded">Cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">

                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" @click="isOpen = !isOpen"
                            class="relative inline-flex items-center justify-center rounded-md bg-stone-100 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div x-show="isOpen" class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-800 hover:bg-gray-700 hover:text-white" -->
                    <a href="/home"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-800 hover:bg-red-600 hover:text-white">Home</a>
                    <a href="/about"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-800 hover:bg-red-600 hover:text-white">About</a>
                    {{-- Product Menu --}}
                    <div x-data="{ produkOpen: false }" class="px-3">
                        <!-- Tombol utama Produk -->
                        <div x-data="{ openProduct: false }" class="px-3">
                            <button @click="openProduct = !openProduct"
                                class="flex w-full items-center rounded-md px-3 py-2 text-base font-medium text-gray-800 hover:bg-red-600 hover:text-white">
                                Product
                                <svg :class="{ 'transform rotate-180': openProduct }"
                                    class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Isi Dropdown Produk Dinamis -->
                            <div x-show="openProduct" x-transition class="mt-2 text-sm text-gray-700 space-y-4 pl-4">
                                @foreach ($categories ?? [] as $category)
                                    <div>
                                        <h4 class="font-semibold">{{ $category->name }}</h4>
                                        <ul class="ml-4 space-y-1">
                                            @foreach ($category->products as $product)
                                                <li>
                                                    <a href="{{ route('produk.brand', ['brand' => Str::slug($product->brand)]) }}"
                                                        class="hover:underline">
                                                        {{ $product->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>




                    {{-- End Product Menu --}}
                    <a href="/project"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-800 hover:bg-red-600 hover:text-white">Project</a>
                    <a href="/contact"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-800 hover:bg-red-600 hover:text-white">Contact</a>
                </div>
            </div>
    </div>
    </div>
    </nav>


</body>

</html>
