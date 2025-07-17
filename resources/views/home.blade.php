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

    <title>@yield('title', 'Mega Jaya Tekindo')</title>
</head>

<body class="min-h-screen scroll-smooth overflow-x-hidden">

    <div class="min-h-full">
        <nav class="bg-white md:bg-transparent md:absolute md:top-0 md:left-0 w-full z-50" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex flex-1 items-center justify-between">
                        <div class="shrink-0">
                            <img class="h-8 w-auto" src="{{ asset('img/logomjt.png') }}" alt="Logo">
                        </div>
                        <div class="hidden md:flex flex-1 justify-center">
                            <div class="ml-10 flex items-baseline space-x-8">
                                <a href="/home"
                                    class="relative px-3 py-2 text-sm font-bold text-stone-100 hover:text-red-400 transition-colors
          before:content-[''] before:absolute before:left-3 before:right-3 before:bottom-1 before:h-0.5
          before:bg-red-600 before:scale-x-0 hover:before:scale-x-100 before:origin-left before:transition-transform before:duration-300">
                                    Home
                                </a>
                                <a href="/about"
                                    class="relative px-3 py-2 text-sm font-bold text-stone-100 hover:text-red-400 transition-colors
          before:content-[''] before:absolute before:left-3 before:right-3 before:bottom-1 before:h-0.5
          before:bg-red-600 before:scale-x-0 hover:before:scale-x-100 before:origin-left before:transition-transform before:duration-300">
                                    About
                                </a>

                                {{-- Product Menu --}}
                                <div class="hidden md:block relative group">
                                    <a href="#"
                                        class="relative px-3 py-2 text-sm font-bold text-stone-100 hover:text-red-400 transition-colors
          before:content-[''] before:absolute before:left-3 before:right-3 before:bottom-1 before:h-0.5
          before:bg-red-600 before:scale-x-0 hover:before:scale-x-100 before:origin-left before:transition-transform before:duration-300">
                                        Product
                                    </a>
                                    <div
                                        class="absolute left-1/2 -translate-x-1/2 mt-2 z-50 hidden group-hover:flex w-[900px] bg-white shadow-lg p-6 rounded-md border border-gray-200 justify-between text-sm">
                                        <div class="grid grid-cols-6 gap-8 w-full">
                                            @foreach ($categories ?? [] as $category)
                                                <div>
                                                    <h4 class="font-bold mb-2">{{ $category->name }}</h4>
                                                    <ul class="space-y-1">
                                                        @php
                                                            $products = collect($category->products)->filter(
                                                                fn($p) => !empty($p->brand),
                                                            );
                                                            $brands = $products->pluck('brand')->unique();
                                                        @endphp

                                                        @if (Str::lower($category->name) === 'accessories')
                                                            @php
                                                                $ebaraAccessories = $products->filter(
                                                                    fn($p) => Str::lower($p->brand) === 'ebara',
                                                                );
                                                                $hasImpeller = $ebaraAccessories->contains(
                                                                    fn($p) => Str::contains(
                                                                        Str::lower($p->name),
                                                                        'impeller',
                                                                    ),
                                                                );
                                                                $hasSealKit = $ebaraAccessories->contains(
                                                                    fn($p) => Str::contains(
                                                                        Str::lower($p->name),
                                                                        'seal kit',
                                                                    ),
                                                                );
                                                            @endphp

                                                            @if ($hasImpeller)
                                                                <li>
                                                                    <a href="{{ route('produk.brand', ['brand' => 'ebara']) }}"
                                                                        class="hover:underline text-gray-700 hover:text-red-600">
                                                                        Impeller (Ebara)
                                                                    </a>
                                                                </li>
                                                            @endif

                                                            @if ($hasSealKit)
                                                                <li>
                                                                    <a href="{{ route('produk.brand', ['brand' => 'ebara']) }}"
                                                                        class="hover:underline text-gray-700 hover:text-red-600">
                                                                        Seal Kit (Ebara)
                                                                    </a>
                                                                </li>
                                                            @endif

                                                            {{-- Tampilkan brand lain di Accessories --}}
                                                            @foreach ($brands as $brand)
                                                                @if (Str::lower($brand) !== 'ebara')
                                                                    <li>
                                                                        <a href="{{ route('produk.brand', ['brand' => Str::slug($brand)]) }}"
                                                                            class="hover:underline text-gray-700 hover:text-red-600">
                                                                            {{ $brand }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @elseif (Str::lower($category->name) === 'submersible pump')
                                                            @foreach ($brands as $brand)
                                                                <li>
                                                                    <a href="{{ route('produk.brand', ['brand' => Str::slug($brand)]) }}"
                                                                        class="hover:underline text-gray-700 hover:text-red-600">
                                                                        @if (Str::lower($brand) === 'ebara')
                                                                            Ebara D-Series
                                                                        @else
                                                                            {{ $brand }}
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            @foreach ($brands as $brand)
                                                                <li>
                                                                    <a href="{{ route('produk.brand', ['brand' => Str::slug($brand)]) }}"
                                                                        class="hover:underline text-gray-700 hover:text-red-600">
                                                                        {{ $brand }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{-- End Product Menu --}}

                                <a href="/project" x-data="{ clicked: false }"
                                    @click="if(clicked){ $event.preventDefault(); } else { clicked = true; }"
                                    :class="{ 'opacity-50 pointer-events-none': clicked }"
                                    class="relative px-3 py-2 text-sm font-bold text-stone-100 hover:text-red-400 transition-colors
          before:content-[''] before:absolute before:left-3 before:right-3 before:bottom-1 before:h-0.5
          before:bg-red-600 before:scale-x-0 hover:before:scale-x-100 before:origin-left before:transition-transform before:duration-300">
                                    Project
                                </a>
                                <a href="/contact" x-data="{ clicked: false }"
                                    @click="if(clicked){ $event.preventDefault(); } else { clicked = true; }"
                                    :class="{ 'opacity-50 pointer-events-none': clicked }"
                                    class="relative px-3 py-2 text-sm font-bold text-stone-100 hover:text-red-400 transition-colors
          before:content-[''] before:absolute before:left-3 before:right-3 before:bottom-1 before:h-0.5
          before:bg-red-600 before:scale-x-0 hover:before:scale-x-100 before:origin-left before:transition-transform before:duration-300">
                                    Contact
                                </a>

                                <form action="{{ route('products.index') }}" method="GET" class="flex items-center">
                                    <input type="text" name="search" placeholder="Cari produk..."
                                        value="{{ $search ?? '' }}"
                                        class="border rounded px-2 py-1 text-sm border-stone-100 text-white hover:border-red-600">
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
                            <div x-show="openProduct" x-transition
                                class="mt-2 text-sm text-gray-700 space-y-4 pl-4 relative md:absolute md:left-1/2 md:-translate-x-1/2 md:mt-2 md:z-50 md:flex md:w-[900px] md:bg-white md:shadow-lg md:p-6 md:rounded-md md:border md:border-gray-200 md:justify-between">
                                @foreach ($categories ?? [] as $category)
                                    <div>
                                        <h4 class="font-bold mb-2">{{ $category->name }}</h4>
                                        <ul class="space-y-1">
                                            @php
                                                $products = collect($category->products)->filter(
                                                    fn($p) => !empty($p->brand),
                                                );
                                                $brands = $products->pluck('brand')->unique();
                                            @endphp

                                            @if (Str::lower($category->name) === 'accessories')
                                                @php
                                                    $ebaraAccessories = $products->filter(
                                                        fn($p) => Str::lower($p->brand) === 'ebara',
                                                    );
                                                    $hasImpeller = $ebaraAccessories->contains(
                                                        fn($p) => Str::contains(Str::lower($p->name), 'impeller'),
                                                    );
                                                    $hasSealKit = $ebaraAccessories->contains(
                                                        fn($p) => Str::contains(Str::lower($p->name), 'seal kit'),
                                                    );
                                                @endphp

                                                @if ($hasImpeller)
                                                    <li>
                                                        <a href="{{ route('produk.brand', ['brand' => 'ebara']) }}"
                                                            class="hover:underline text-gray-700 hover:text-red-600">
                                                            Impeller (Ebara)
                                                        </a>
                                                    </li>
                                                @endif

                                                @if ($hasSealKit)
                                                    <li>
                                                        <a href="{{ route('produk.brand', ['brand' => 'ebara']) }}"
                                                            class="hover:underline text-gray-700 hover:text-red-600">
                                                            Seal Kit (Ebara)
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- Tampilkan brand lain di Accessories --}}
                                                @foreach ($brands as $brand)
                                                    @if (Str::lower($brand) !== 'ebara')
                                                        <li>
                                                            <a href="{{ route('produk.brand', ['brand' => Str::slug($brand)]) }}"
                                                                class="hover:underline text-gray-700 hover:text-red-600">
                                                                {{ $brand }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @elseif (Str::lower($category->name) === 'submersible pump')
                                                @foreach ($brands as $brand)
                                                    <li>
                                                        <a href="{{ route('produk.brand', ['brand' => Str::slug($brand)]) }}"
                                                            class="hover:underline text-gray-700 hover:text-red-600">
                                                            @if (Str::lower($brand) === 'ebara')
                                                                Ebara D-Series
                                                            @else
                                                                {{ $brand }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                @foreach ($brands as $brand)
                                                    <li>
                                                        <a href="{{ route('produk.brand', ['brand' => Str::slug($brand)]) }}"
                                                            class="hover:underline text-gray-700 hover:text-red-600">
                                                            {{ $brand }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
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
        </nav>

        <!-- HEADER FULLSCREEN DENGAN BACKGROUND BERGERAK -->
        <header class="relative w-full h-screen overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <img src="/img/galleryproject/Hydrant.jpg" alt="Background Hydrant"
                    class="w-full h-full object-cover object-center brightness-50">
            </div>

            <!-- Konten Header -->
            <div class="relative z-20 flex items-center justify-center h-full mb-10">
                <div class="container mx-auto px-6 flex flex-col lg:flex-row items-center justify-between py-16">
                    <!-- Teks Konten -->
                    <div class="w-full lg:w-1/2 mb-10 lg:mb-0" data-aos="fade-down" data-aos-duration="1200">
                        <span class="w-20 h-2 bg-white mb-12 block" data-aos="fade-right"
                            data-aos-delay="200"></span>
                        <h1 class="font-bebas-neue uppercase text-5xl sm:text-7xl font-black leading-none text-white drop-shadow-xl"
                            data-aos="zoom-in" data-aos-delay="400">
                            Mega Jaya
                            <span class="text-4xl sm:text-6xl block pb-3 drop-shadow-xl" data-aos="fade-left"
                                data-aos-delay="600">Tekindo</span>
                        </h1>
                        <p class="text-sm sm:text-base text-white mt-4" data-aos="fade-up" data-aos-delay="800">
                            Reliable Engineering. Proven Performance. <br> and Driven by Quality. Powered by Trust.
                            </br>
                        </p>
                        <div class="mt-8" data-aos="fade-up" data-aos-delay="1000">
                            <a href="#about"
                                class="uppercase py-2 px-4 rounded-lg bg-neutral-50 border-2 border-transparent text-stone-900 text-md mr-4 hover:bg-amber-500 transition-all duration-300 shadow-lg hover:scale-105">
                                Get started
                            </a>
                        </div>
                    </div>

                    <!-- Gambar Produk -->
                    <div class="hidden lg:grid grid-cols-2 md:grid-cols-3 gap-6 w-full max-w-6xl" data-aos="fade-left"
                        data-aos-delay="800">
                        <!-- Card 1 -->
                        <div
                            class="rounded-3xl overflow-hidden shadow-xl hover:scale-105 transition duration-500 bg-white/70 p-4">
                            <div class=" rounded-2xl p-2">
                                <img src="/img/hydrantPump.png" alt="Hydrant Pump"
                                    class="w-full h-60 object-contain">
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div
                            class="rounded-3xl overflow-hidden shadow-xl hover:scale-105 transition duration-500 bg-white/70 p-4">
                            <div class=" rounded-2xl p-2">
                                <img src="/img/titanPump.png" alt="Titan Pump" class="w-full h-60 object-contain">
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div
                            class="rounded-3xl overflow-hidden shadow-xl hover:scale-105 transition duration-500 bg-white/70 p-4">
                            <div class=" rounded-lg p-2">
                                <img src="/img/gs/gs.png" alt="GS Pump" class="w-full h-60 object-contain">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <main>
            {{-- About Us Section --}}
            <section class="bg-stone-50 text-black py-16 lg:py-24 w-full p-10" id="about" data-aos="fade-up"
                data-aos-duration="1200">
                <div class="max-w-7xl mx-auto px-4 lg:px-8">
                    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                        {{-- Left Content --}}
                        <div class="space-y-8">
                            {{-- Small accent line --}}
                            <div class="w-16 h-0.5 bg-red-600"></div>

                            {{-- Main heading --}}
                            <h2 class="text-3xl lg:text-4xl xl:text-4xl font-bold leading-tight text-black"
                                data-aos="fade-right" data-aos-delay="200">
                                ABOUT US
                            </h2>

                            {{-- Description text --}}
                            <p class="text-black text-sm lg:text-lg leading-relaxed max-w-2xl" data-aos="fade-right"
                                data-aos-delay="400">
                                Mega Jaya Tekindo adalah perusahaan yang bergerak di bidang penyediaan pompa industri,
                                motor listrik, dan peralatan teknik. Kami menyediakan solusi berkualitas untuk berbagai
                                kebutuhan industri dan komersial, dengan produk dari merek terpercaya seperti EBARA,
                                Grundfos, Teco, dan lainnya.

                                Didukung oleh tim berpengalaman, kami berkomitmen untuk memberikan layanan terbaik
                                melalui konsultasi teknis, pemilihan produk yang tepat, serta dukungan purna jual yang
                                profesional.

                            </p>

                            {{-- CTA Button --}}
                            <div class="pt-4" data-aos="fade-right" data-aos-delay="600">
                                <a href="/about"
                                    class="inline-block bg-red-600 hover:bg-amber-500 text-stone-50 font-semibold px-8 py-4 rounded transition-colors duration-300 uppercase tracking-wide">
                                    Learn More
                                </a>
                            </div>
                        </div>

                        {{-- Right Image --}}
                        <div class="relative" data-aos="fade-left" data-aos-delay="800">
                            <div class="aspect-w-4 aspect-h-3 lg:aspect-w-16 lg:aspect-h-10">
                                <img src="./img/aboutData1.png"
                                    alt="Industrial warehouse with equipment and machinery"
                                    class="w-full h-80 object-cover rounded-xl shadow-xl backdrop:shadow-2xl">
                            </div>

                            {{-- Optional overlay for better text contrast if needed --}}

                        </div>
                    </div>
                </div>
            </section>

            {{-- Akhir About Us  --}}

            {{-- Main Product Section --}}
            <section class="bg-white py-16 lg:py-24 w-full p-10" id="products" data-aos="fade-up"
                data-aos-duration="1200">
                <div class="max-w-7xl mx-auto px-4 lg:px-8">
                    <div class="mb-12 text-center">
                        <div class="w-16 h-1 mx-auto bg-red-600 mb-4"></div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 tracking-tight">MAIN PRODUCT</h2>
                        <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                            Kami menghadirkan produk-produk unggulan yang telah terbukti kualitas dan keandalannya di
                            berbagai sektor industri. Setiap produk kami dirancang untuk memberikan solusi terbaik,
                            efisiensi tinggi, dan daya tahan maksimal sesuai kebutuhan Anda.
                        </p>
                    </div>
                    <div class="relative">
                        <div class="flex gap-8 overflow-x-auto scrollbar-thin scrollbar-thumb-red-400 scrollbar-track-gray-200 pb-4"
                            style="scroll-snap-type: x mandatory;">
                            <!-- Ebara Card -->
                            <div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false"
                                @click="show = !show"
                                class="min-w-[280px] max-w-xs flex-shrink-0 bg-stone-50 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 flex flex-col items-center p-8 scroll-snap-align-start relative cursor-pointer hover:scale-105 hover:-translate-y-2 transition-all duration-500"
                                data-aos="zoom-in" data-aos-delay="200">
                                <img src="./img/logo/ebara.png" alt="Ebara" class="h-20 mb-6 object-contain">
                                <h3 class="text-xl font-bold mb-2 text-gray-800">Ebara</h3>
                                <p class="text-gray-600 mb-4 text-center">Pompa industri dan submersible dengan
                                    teknologi Jepang, efisiensi tinggi, dan daya tahan luar biasa untuk aplikasi air
                                    bersih maupun limbah.</p>
                                <a href="/produk/ebara" x-data="{ clicked: false }"
                                    @click="if(clicked){ $event.preventDefault(); } else { clicked = true; }"
                                    :class="{ 'opacity-50 pointer-events-none': clicked }"
                                    class="mt-auto inline-block bg-red-600 hover:bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                    Detail</a>
                                <!-- Overlay/Detail -->
                                <div x-show="show" x-transition
                                    class="absolute inset-0 bg-white bg-opacity-95 flex flex-col items-center justify-center p-6 rounded-xl shadow-xl z-10"
                                    @click.away="show = false">
                                    <h3 class="text-xl font-bold mb-2 text-gray-800">Ebara</h3>
                                    <p class="text-gray-600 mb-4 text-center">Pompa industri dan submersible dengan
                                        teknologi Jepang, efisiensi tinggi, dan daya tahan luar biasa untuk aplikasi air
                                        bersih maupun limbah.</p>
                                    <a href="/produk/ebara"
                                        class="inline-block bg-red-600 hover:bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                        Detail</a>
                                </div>
                            </div>
                            <!-- Titan Card -->
                            <div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false"
                                @click="show = !show"
                                class="min-w-[280px] max-w-xs flex-shrink-0 bg-stone-50 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 flex flex-col items-center p-8 scroll-snap-align-start relative cursor-pointer hover:scale-105 hover:-translate-y-2 transition-all duration-500"
                                data-aos="zoom-in" data-aos-delay="400">
                                <img src="./img/logo/titan.png" alt="Titan" class="h-20 mb-6 object-contain">
                                <h3 class="text-xl font-bold mb-2 text-gray-800">Titan</h3>
                                <p class="text-gray-600 mb-4 text-center">Motor listrik dan pompa heavy-duty, handal
                                    untuk kebutuhan industri berat, dengan performa stabil dan perawatan minimal.</p>
                                <a href="/produk/titan" x-data="{ clicked: false }"
                                    @click="if(clicked){ $event.preventDefault(); } else { clicked = true; }"
                                    :class="{ 'opacity-50 pointer-events-none': clicked }"
                                    class="mt-auto inline-block bg-red-600 hover:bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                    Detail</a>
                                <!-- Overlay/Detail -->
                                <div x-show="show" x-transition
                                    class="absolute inset-0 bg-white bg-opacity-95 flex flex-col items-center justify-center p-6 rounded-xl shadow-xl z-10"
                                    @click.away="show = false">
                                    <h3 class="text-xl font-bold mb-2 text-gray-800">Titan</h3>
                                    <p class="text-gray-600 mb-4 text-center">Motor listrik dan pompa heavy-duty,
                                        handal untuk kebutuhan industri berat, dengan performa stabil dan perawatan
                                        minimal.</p>
                                    <a href="/produk/titan"
                                        class="inline-block bg-red-600 hover:bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                        Detail</a>
                                </div>
                            </div>
                            <!-- Grundfos Card -->
                            <div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false"
                                @click="show = !show"
                                class="min-w-[280px] max-w-xs flex-shrink-0 bg-stone-50 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 flex flex-col items-center p-8 scroll-snap-align-start relative cursor-pointer hover:scale-105 hover:-translate-y-2 transition-all duration-500"
                                data-aos="zoom-in" data-aos-delay="600">
                                <img src="./img/logo/grundfos2.png" alt="Grundfos" class="h-20 mb-6 object-contain">
                                <h3 class="text-xl font-bold mb-2 text-gray-800">Grundfos</h3>
                                <p class="text-gray-600 mb-4 text-center">Solusi pompa global untuk efisiensi energi,
                                    ramah lingkungan, dan teknologi mutakhir untuk berbagai aplikasi air dan industri.
                                </p>
                                <a href="/produk/grundfos" x-data="{ clicked: false }"
                                    @click="if(clicked){ $event.preventDefault(); } else { clicked = true; }"
                                    :class="{ 'opacity-50 pointer-events-none': clicked }"
                                    class="mt-auto inline-block bg-red-600 hover:bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                    Detail</a>
                                <!-- Overlay/Detail -->
                                <div x-show="show" x-transition
                                    class="absolute inset-0 bg-white bg-opacity-95 flex flex-col items-center justify-center p-6 rounded-xl shadow-xl z-10"
                                    @click.away="show = false">
                                    <h3 class="text-xl font-bold mb-2 text-gray-800">Grundfos</h3>
                                    <p class="text-gray-600 mb-4 text-center">Solusi pompa global untuk efisiensi
                                        energi, ramah lingkungan, dan teknologi mutakhir untuk berbagai aplikasi air dan
                                        industri.</p>
                                    <a href="/produk/grundfos"
                                        class="inline-block bg-red-600 hover:bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                        Detail</a>
                                </div>
                            </div>
                            <!-- Siemens Card -->
                            <div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false"
                                @click="show = !show"
                                class="min-w-[280px] max-w-xs flex-shrink-0 bg-stone-50 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 flex flex-col items-center p-8 scroll-snap-align-start relative cursor-pointer hover:scale-105 hover:-translate-y-2 transition-all duration-500"
                                data-aos="zoom-in" data-aos-delay="800">
                                <img src="./img/logo/siemens.png" alt="Siemens"
                                    class="h-8 mt-12 mb-6 object-contain">
                                <h3 class="text-xl font-bold mb-2 text-gray-800">Siemens</h3>
                                <p class="text-gray-600 mb-4 text-center">Motor listrik industri dengan efisiensi
                                    tinggi, teknologi Jerman, dan keandalan untuk berbagai aplikasi otomasi dan
                                    manufaktur.</p>
                                <a href="/produk/siemens"
                                    class="mt-auto inline-block bg-red-600 hover:bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                    Detail</a>
                                <!-- Overlay/Detail -->
                                <div x-show="show" x-transition
                                    class="absolute inset-0 bg-white bg-opacity-95 flex flex-col items-center justify-center p-6 rounded-xl shadow-xl z-10"
                                    @click.away="show = false">
                                    <h3 class="text-xl font-bold mb-2 text-gray-800">Siemens</h3>
                                    <p class="text-gray-600 mb-4 text-center">Motor listrik industri dengan efisiensi
                                        tinggi, teknologi Jerman, dan keandalan untuk berbagai aplikasi otomasi dan
                                        manufaktur.</p>
                                    <a href="/produk/siemens"
                                        class="inline-block bg-red-600 hover:bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                        Detail</a>
                                </div>
                            </div>
                            <!-- Torishima Card -->
                            <div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false"
                                @click="show = !show"
                                class="min-w-[280px] max-w-xs flex-shrink-0 bg-stone-50 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 flex flex-col items-center p-8 scroll-snap-align-start relative cursor-pointer hover:scale-105 hover:-translate-y-2 transition-all duration-500"
                                data-aos="zoom-in" data-aos-delay="1000">
                                <img src="./img/logo/torishima.png" alt="Torishima"
                                    class="h-13 mt-10 mb-6 object-contain">
                                <h3 class="text-xl font-bold mb-2 text-gray-800">Torishima</h3>
                                <p class="text-gray-600 mb-4 text-center">Pompa sentrifugal premium dari Jepang, ideal
                                    untuk aplikasi industri berat, pembangkit listrik, dan infrastruktur air.</p>
                                <a href="/produk/torishima" x-data="{ clicked: false }"
                                    @click="if(clicked){ $event.preventDefault(); } else { clicked = true; }"
                                    :class="{ 'opacity-50 pointer-events-none': clicked }"
                                    class="mt-auto inline-block bg-red-600 hover:8bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                    Detail</a>
                                <!-- Overlay/Detail -->
                                <div x-show="show" x-transition
                                    class="absolute inset-0 bg-white bg-opacity-95 flex flex-col items-center justify-center p-6 rounded-xl shadow-xl z-10"
                                    @click.away="show = false">
                                    <h3 class="text-xl font-bold mb-2 text-gray-800">Torishima</h3>
                                    <p class="text-gray-600 mb-4 text-center">Pompa sentrifugal premium dari Jepang,
                                        ideal untuk aplikasi industri berat, pembangkit listrik, dan infrastruktur air.
                                    </p>
                                    <a href="/produk/torishima"
                                        class="inline-block bg-red-600 hover:bg-amber-500 text-white font-semibold px-6 py-2 rounded transition-colors duration-300">Lihat
                                        Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- Akhir Main Product Section --}}

            {{-- our Advantages --}}

            <section class="bg-gray-100 py-16 lg:py-20" data-aos="fade-up" data-aos-duration="1200">
                <div class="container mx-auto px-4 lg:px-8">
                    <div class="grid lg:grid-cols-1 gap-12 lg:gap-16">
                        <div>
                            <h2 class="text-3xl lg:text-4xl font-extrabold bg-gradient-to-r from-amber-500 via-red-600 to-gray-200 bg-clip-text text-transparent mb-6 text-center"
                                data-aos="fade-down" data-aos-delay="200">
                                OUR ADVANTAGES
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <!-- Advantage 1 -->
                                <div class="flex flex-col items-center text-center p-6" data-aos="zoom-in"
                                    data-aos-delay="400">
                                    <div
                                        class="w-20 h-20 bg-gradient-to-r from-stone-200  to-red-600 rounded-full flex items-center justify-center mb-4">
                                        <!-- Replace with your actual logo/image -->
                                        <i class="bi bi-droplet-fill text-blue-600 text-3xl"></i>
                                    </div>
                                    <h3 class="text-xl font-semibold mb-2">Efisiensi dan Kinerja Optimal</h3>
                                    <p class="text-gray-600">Pompa dirancang untuk efisiensi aliran maksimum dengan
                                        konsumsi energi yang rendah, cocok untuk aplikasi industri, komersial, dan
                                        perumahan.</p>
                                </div>

                                <!-- Advantage 2 -->
                                <div class="flex flex-col items-center text-center p-6" data-aos="zoom-in"
                                    data-aos-delay="600">
                                    <div
                                        class="w-20 h-20 bg-gradient-to-r from-stone-200  to-red-600 rounded-full flex items-center justify-center mb-4">
                                        <!-- Replace with your actual logo/image -->
                                        <i class="bi bi-wrench text-gray-700 text-3xl"></i>
                                    </div>
                                    <h3 class="text-xl font-semibold mb-2">Teknis Profesional</h3>
                                    <p class="text-gray-600">Didukung oleh tim teknisi berpengalaman dan
                                        bersertifikat
                                        yang
                                        siap membantu instalasi, perawatan, dan troubleshooting unit pompa.</p>
                                </div>

                                <!-- Advantage 3 -->
                                <div class="flex flex-col items-center text-center p-6" data-aos="zoom-in"
                                    data-aos-delay="800">
                                    <div
                                        class="w-20 h-20 bg-gradient-to-r from-stone-200  to-red-600 rounded-full flex items-center justify-center mb-4">
                                        <!-- Replace with your actual logo/image -->
                                        <i class="bi bi-trophy-fill text-amber-300 text-3xl"></i>
                                    </div>
                                    <h3 class="text-xl font-semibold mb-2">Reputasi & Pengalaman Terpercaya</h3>
                                    <p class="text-gray-600">Dengan pengalaman lebih dari 10 tahun di industri,
                                        kami
                                        telah
                                        menjadi mitra terpercaya untuk berbagai proyek skala kecil hingga besar.</p>
                                </div>

                            </div>
                        </div>
                    </div>
            </section>
            {{-- Akhir Our Advantages --}}

            {{-- Contact us dan tentang kami --}}
            {{-- Produk Kami & Contact Section --}}
            <section class="bg-white py-16 lg:py-20" data-aos="fade-up" data-aos-duration="1200">
                {{-- ubah dari bg-gray-100 ke bg-white --}}
                <div class="container mx-auto px-4 lg:px-8">
                    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
                        {{-- Left Side - Produk Kami --}}
                        <div>
                            <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-800 mb-6" data-aos="fade-right"
                                data-aos-delay="200">
                                PRODUK KAMI
                            </h2>
                            <p class="text-gray-600 text-lg mb-8">
                                Lini Produk Dasar kami terbagi menjadi 3 Divisi :
                            </p>

                            <div class="space-y-8">
                                {{-- Electric Motors --}}
                                <div class="border-l-4 border-red-600 pl-6" data-aos="fade-left"
                                    data-aos-delay="400">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                                        1. Electric Motors
                                    </h3>
                                    <div class="space-y-3 text-gray-600">
                                        <div><span class="font-medium">Types:</span> Standard, Vibromotor, Geared
                                            or
                                            Explosion-proof</div>
                                        <div><span class="font-medium">Induction:</span> Single or three phase
                                        </div>
                                        <div><span class="font-medium">Drives:</span> AC or DC</div>
                                        <div><span class="font-medium">Frequency:</span> 50 or 60 Hz</div>
                                        <div><span class="font-medium">Speed:</span> 2, 4, 6 Poles</div>
                                        <div><span class="font-medium">Brand:</span> Titan, Siemens, Teco, Cummins,
                                            Isuzu
                                            Engines
                                        </div>
                                    </div>
                                </div>

                                {{-- Water Pumps --}}
                                <div class="border-l-4 border-amber-500 pl-6" data-aos="fade-left"
                                    data-aos-delay="600">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                                        2. Water Pumps
                                    </h3>
                                    <p class="text-gray-600">
                                        Centrifugal, Submersible, dan Industrial pumps untuk berbagai aplikasi
                                        industri
                                        dan komersial.
                                    </p>
                                </div>

                                {{-- Control Systems --}}
                                <div class="border-l-4 border-gray-300 pl-6" data-aos="fade-left"
                                    data-aos-delay="800">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                                        3. Control Systems
                                    </h3>
                                    <p class="text-gray-600">
                                        Smart monitoring dan control systems untuk optimasi operasional dan
                                        efisiensi
                                        energi.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Right Side - Contact Us --}}
                        <div>
                            <div class="mb-8" data-aos="fade-left" data-aos-delay="200">
                                <h4 class="text-sm font-semibold tracking-wide uppercase text-gray-400 mb-4">Our
                                    Solution
                                </h4>
                                <h2 class="text-3xl sm:text-4xl font-extrabold mb-6">
                                    MENYAJIKAN KEUNGGULAN ENGINEERING <br class="hidden sm:block" />
                                    DENGAN INTEGRITAS DAN PRESISI
                                </h2>
                                <p class="text-lg text-gray-600 leading-relaxed mb-10 max-w-3xl">
                                    <strong>PT Mega Jaya Tekindo</strong> berkomitmen untuk menghadirkan solusi
                                    engineering
                                    berkualitas tinggi yang memenuhi standar tertinggi dalam hal performa,
                                    keandalan,
                                    dan
                                    inovasi. Dengan spesialisasi pada sistem pompa industri dan layanan teknikal,
                                    kami
                                    menawarkan solusi yang disesuaikan untuk menjawab tantangan unik dari setiap
                                    klien.
                                    <br><br>
                                    Dedikasi kami terhadap presisi teknis, kepuasan pelanggan, dan perbaikan
                                    berkelanjutan
                                    menjadikan kami mitra terpercaya di sektor industri.
                                </p>
                                <div class="space-y-4 m-auto content-center">
                                    <a href="/contact"
                                        class="inline-block bg-red-600 hover:bg-amber-500 text-stone-100 font-semibold py-3 px-6 rounded-md transition duration-300">
                                        <i class="bi bi-arrow-return-right"></i> Contact Us
                                    </a>
                                </div>
                            </div>



                            <div class="mt-8 pt-8 border-t border-gray-200" data-aos="fade-up" data-aos-delay="400">
                                <div class="text-center space-y-3">
                                    <div class="flex items-center justify-center gap-2 text-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <span>Williammarcello30@gmail.com</span>
                                    </div>
                                    <div class="flex items-center justify-center gap-2 text-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <span>+62 857-7523-0813</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            {{-- Akhir Contact us dan tentang kami --}}

            {{-- Logo (home) --}}

            <section class="py-12 bg-gray-50" data-aos="fade-up" data-aos-duration="1200">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10" data-aos="fade-down"
                        data-aos-delay="200">Merek Kami</h2>

                    {{-- Grid untuk menampilkan logo --}}
                    <div
                        class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center justify-items-center">
                        {{-- Baris 1 --}}
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="200">
                            <img src="{{ asset('./img/logo/siemens.png') }}" alt="Siemens"
                                class="max-h-16 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="300">
                            <img src="{{ asset('./img/logo/teco.png') }}" alt="Teco"
                                class="max-h-16 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="400">
                            <img src="{{ asset('./img/logo/koshin.png') }}" alt="koshin"
                                class="max-h-14 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="500">
                            <img src="{{ asset('./img/logo/titan.png') }}" alt="Titan"
                                class="max-h-14 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="600">
                            <img src="{{ asset('./img/logo/cummins.png') }}" alt="Cummins"
                                class="max-h-14 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="700">
                            <img src="{{ asset('./img/logo/torishima.png') }}" alt="Torishima"
                                class="max-h-14 w-auto object-contain">
                        </div>

                        {{-- Baris 2 --}}
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="800">
                            <img src="{{ asset('./img/logo/ebara.png') }}" alt="Ebara"
                                class="max-h-16 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="900">
                            <img src="{{ asset('./img/logo/ksb2.png') }}" alt="KSB"
                                class="max-h-16 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="1000">
                            <img src="{{ asset('./img/logo/grundfos2.png') }}" alt="Grundfos"
                                class="max-h-16 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="1100">
                            <img src="{{ asset('./img/logo/isuzu.png') }}" alt="Isuzu"
                                class="max-h-14 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="1100">
                            <img src="{{ asset('./img/logo/fawde.png') }}" alt="Fawde"
                                class="max-h-14 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="1100">
                            <img src="{{ asset('./img/logo/tival.png') }}" alt="Tival Sensor"
                                class="max-h-17 w-auto object-contain">
                        </div>
                        <div class="p-2" data-aos="zoom-in" data-aos-delay="1100">
                            <img src="{{ asset('./img/logo/motology.png') }}" alt="Motology Electric"
                                class="max-h-17 w-auto object-contain">
                        </div>
                        {{-- Tambahkan logo lain sesuai kebutuhan --}}
                    </div>
                </div>
            </section>


            {{-- Akhir Logo (Home) --}}

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
                                <img src="./img/socialmedia/instagram.png" alt="Instagram"
                                    class="w-16 h-16 transition-transform transform hover:scale-110">
                            </a>
                            <a href="https://Tokopedia.com/megashop2019" target="_blank" rel="noopener"
                                class="inline-block mt-2">
                                <img src="./img/socialmedia/tokopedia.png" alt="Tokopedia"
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




        </main>
    </div>


    {{-- Akhir Tailwind css (Navbar) --}}

    {{-- Script Javascript --}

    {{-- Main Product Scroll --Home --}}
    <script>
        const scrollContainer = document.getElementById('productScroll');
        const scrollLeft = document.getElementById('scrollLeft');
        const scrollRight = document.getElementById('scrollRight');
        const cardWidth = 335; // 280 min-w + 12 gap (per card)

        if (scrollRight && scrollContainer) {
            scrollRight.addEventListener('click', () => {
                scrollContainer.scrollBy({
                    left: cardWidth,
                    behavior: 'smooth'
                });
            });
        }
        if (scrollLeft && scrollContainer) {
            scrollLeft.addEventListener('click', () => {
                scrollContainer.scrollBy({
                    left: -cardWidth,
                    behavior: 'smooth'
                });
            });
        }
    </script>


    {{-- Akhir Main Product (Home) --}}

    {{-- Contact us dan Produk kami (Home) --}}
    <script>
        setTimeout(() => {
            const successMsg = document.getElementById('success-message');
            const errorMsg = document.getElementById('error-message');
            if (successMsg) successMsg.style.display = 'none';
            if (errorMsg) errorMsg.style.display = 'none';
        }, 5000);
    </script>

    {{-- Akhir Contact us dan Produk kami --}}

    {{-- AOS Effek Script --}}

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            disable: 'false',
            duration: 3000,
        });
    </script>

    {{-- Akhir AOS Effek Script --}}

    {{-- Akhir Script --}}
</body>


</html>
