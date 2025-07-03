<!DOCTYPE html>
<html lang="en">



<body>

    @include('components.navbar')

    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
            <div class="mb-4">
                <strong>Kategori:</strong> {{ $product->category->name ?? '-' }}
            </div>
            <div class="mb-4">
                <strong>Brand:</strong> {{ $product->brand }}
            </div>
            <div class="mb-4">
                <strong>Deskripsi:</strong> {{ $product->description }}
            </div>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-64 object-contain">
            @endif
        </div>
    @endsection

</body>

</html>
