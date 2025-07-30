<a  href="{{ route('produkDetail', $product->slug) }}" class="group overflow-hidden">
    <div class="relative h-64 object-cover bg-center group-hover:scale-105 transition-transform duration-300">
        @if($product->gambar)
            <img 
                class="w-full h-full object-cover rounded-2xl" 
                src="{{ asset('storage/' . $product->gambar) }}" 
                alt="{{ $product->nama }}"
                loading="lazy"
                onerror="this.src='{{ asset('images/placeholder-product.jpg') }}'"
            >
        @else
            <div class="w-full h-full bg-gray-200 rounded-2xl flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif
        
        <div class="absolute group-hover:opacity-100 opacity-0 transition-opacity duration-300 rotate-[-135deg] z-10 inset-0 flex items-center justify-center text-white">
            <div 
                class="group-hover:backdrop-blur-sm rounded-full p-2 hover:bg-white/10 transition-all duration-200" 
                aria-label="View details for {{ $product->nama }}"
            >
                <svg 
                    class="w-14 h-14" 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 5l0 14" />
                    <path d="M16 15l-4 4" />
                    <path d="M8 15l4 4" />
                </svg>
            </div>
        </div>
        
        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
    </div>
    
    <div class="p-4">
        <h2 class="text-center capitalize font-semibold text-gray-800 mb-2 text-sm sm:text-base md:text-lg line-clamp-2">
            {{ $product->nama }}
        </h2>
    </div>
</a>