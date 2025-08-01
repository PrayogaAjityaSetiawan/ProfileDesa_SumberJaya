<div class="md:w-[80%] 2xl:w-[70%] mx-auto px-4 sm:px-6 lg:px-8 mt-30 selection:bg-[#05426F] selection:text-white">
    <h1 class="text-2xl font-bold mb-6">Galeri Desa</h1>
    <p class="mb-8 text-gray-600">Dapatkan informasi terkini dan artikel menarik seputar desa</p>
    
    <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-6">
        @if (isset($galeris) && $galeris->count() > 0)
        
            @foreach($galeris as $item)
            <div class="bg-white rounded-lg overflow-hidden group transition-all duration-300 transform hover:-translate-y-1">
                <div class="relative overflow-hidden">
                    <img 
                        src="{{ Storage::url($item->gambar) }}" 
                        class="w-full h-72 object-cover bg-cover bg-no-repeat group-hover:scale-105 transition-transform duration-500" 
                        alt="{{ $item->judul }}"
                    >
                    
                    <!-- Subtle overlay on hover -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300"></div>
                    
                    <!-- Optional: Image title overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="text-white font-medium text-sm truncate">{{ $item->judul }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p class="text-gray-600">Tidak ada galeri desa</p>
        @endif
    </div>

    <div class="mt-6">
        {{ $galeris->links() }}
    </div>
</div>