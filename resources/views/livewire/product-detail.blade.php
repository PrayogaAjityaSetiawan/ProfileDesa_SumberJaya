<div class="md:w-[80%] 2xl:w-[70%] px-4 mx-auto pt-30 selection:bg-[#05426F] selection:text-white">
    <div class="flex items-center space-x-2 text-sm mb-3">
        <a href="{{ route('homepage') }}" wire:navigate class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 cursor-pointer transition-colors">
            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
            </svg>
            Home
        </a>
        
        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
        </svg>
        
        <a href="{{ route('produk') }}" wire:navigate class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 hover:bg-gray-200 cursor-pointer transition-colors">
            Produk
        </a>
        
        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
        </svg>
        
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
            {{ $product->nama }}
        </span>
    </div>

    <div class="w-full flex flex-col md:flex-row  items-start gap-5">
        <div class="md:w-1/2 ">
            <img class=" rounded-2xl bg-center bg-cover" src="{{ asset('storage/' . $product->gambar) }}" alt="">
        </div>
        <div class="md:w-1/2 flex flex-col gap-3">
            <div class="flex flex-row md:flex-col justify-between">
                <h1 class="text-2xl capitalize font-bold">{{ $product->nama }}</h1>
                <span class="text-lg font-semibold text-green-600">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
            </div>
            <p class="text-justify">{{ $product->deskripsi }}</p>
            <span class="text-sm text-  "> Vidio Wawancara Untuk Produk {{ $product->nama }}   </span>
            <iframe class="rounded-2xl" width="100%" height="315"
                src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
            <div class="flex flex-row gap-3">
                <div class="w-1/2 flex flex-col gap-2">
                    {{-- Tombol WhatsApp --}}
                    @if ($product->no_wa)
                        <a href="{{ $product->no_wa }}" target="_blank"
                            class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                            Hubungi via WhatsApp
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
