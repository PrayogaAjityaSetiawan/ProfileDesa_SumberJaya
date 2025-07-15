<section class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto ">
    <x-header-section 
        title="Perangkat Desa" 
        description="Kami menyediakan perangkat desa untuk anda, Kami selalu ada untuk anda" 
        link="{{ route('struktur-desa') }}" 
        linkText="lihat semua" 
    />
    @if ($perangkatDesas->isEmpty())
        <div class="text-center py-10">
            <h1 class="text-xl font-semibold text-gray-600">Belum ada perangkat desa</h1>
        </div>
    @else
        {{-- Perangkat Mobile --}}
        <x-sweeper-header
            link="{{ route('struktur-desa') }}"
            linkText="lihat semua"
            swiperClass="perangkat-swiper"
            slidesPerView="2"
            
        >
            @foreach ($perangkatDesas as $perangkat)
                <div class="swiper-slide" wire:key="product-mobile-{{ $perangkat->id }}">
                    <x-card-perangkat :perangkat="$perangkat" />
                </div>
            @endforeach
        </x-sweeper-header>

        {{-- Perangkat Desktop --}}
        <div class="hidden md:grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 md:gap-6">
            @foreach ($perangkatDesas as $perangkat)
                <x-card-perangkat :perangkat="$perangkat" wire:key="perangkat-{{ $perangkat->id }}" />
            @endforeach
        </div>
    @endif
</section>