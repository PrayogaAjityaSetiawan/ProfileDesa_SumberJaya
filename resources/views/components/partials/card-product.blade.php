<div>
    <div class="group overflow-hidden">
        @if($product->gambar)
            <img class="w-full rounded-2xl h-64 object-cover bg-center group-hover:scale-105 transition-transform duration-300" src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}">
        @endif
        <div class="p-4">
            <h2 class="text-center capitalize font-semibold text-gray-800 mb-2 text-sm sm:text-base md:text-lg ">
                {{ $product->nama }}
            </h2>
            <a href="{{ route('produkDetail', $product->slug) }}" class="block text-center py-2 px-4 border border-gray-800 text-gray-800 rounded-full hover:bg-gray-800 hover:text-white transition-colors duration-300">Detail Produk</a>
        </div>
    </div>
</div>