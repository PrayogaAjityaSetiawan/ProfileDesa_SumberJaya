<section class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto my-20">
    <x-header-section 
        title="Produk UMKM" 
        description="Dengan Senang Hati kami menyediakan produk-produk terbaik untuk anda" 
        link="{{ route('produk') }}" 
        linkText="lihat semua" 
    />
        @if ($products->isEmpty())
            <div class="text-center py-10">
                <div class="max-w-md mx-auto">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-600">Produk UMKM akan segera hadir di sini.</p>
            </div>
        @else

        {{-- Produk Mobile --}}
        <x-sweeper-header
            link="{{ route('produk') }}"
            linkText="lihat semua"
            swiperClass="produk-swiper"
            slidesPerView="2"
        >
            @foreach ($products as $product)
                <div class="swiper-slide" wire:key="product-mobile-{{ $product->id }}">
                    <x-card-product :product="$product" />
                </div>
            @endforeach
        </x-sweeper-header>

        {{-- Produk Desktop --}}
        <div class="hidden mx-auto md:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            @foreach ($products as $product)
                <x-card-product :product="$product" wire:key="product-{{ $product->id }}" />
            @endforeach
        </div>
    @endif
</section>