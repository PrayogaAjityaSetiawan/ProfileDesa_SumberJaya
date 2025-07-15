<section class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto my-20">
    <x-header-section 
        title="Produk UMKM" 
        description="Dengan Senang Hati kami menyediakan produk-produk terbaik untuk anda" 
        link="{{ route('produk') }}" 
        linkText="lihat semua" 
    />
        @if ($products->isEmpty())
            <div class="text-center py-10">
                <h1 class="text-xl font-semibold text-gray-600">Belum ada produk</h1>
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