<section class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto mb-20">
    <x-header-section 
        title="Galeri Desa Sumberjaya" 
        description="Dengan Senang Hati kami menyediakan produk-produk terbaik untuk anda" 
        link="{{ route('galeri') }}" 
        linkText="lihat semua" 
    />
    <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4">
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
    </div>
</section>