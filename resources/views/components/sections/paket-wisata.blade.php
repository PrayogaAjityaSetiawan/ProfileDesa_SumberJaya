<section class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto mb-20 ">
    <x-header-section 
        title="Paket Wisata" 
        description="Berikut ini paket wisata serambi ujung kulon yang akan membuat anda merasakan pengalaman baru" 
        link="{{ route('paket-wisata') }}" 
        linkText="lihat semua" 
    />
        @if ($paketWisatas->isEmpty())
            <div class="text-center py-10">
                <h1 class="text-xl font-semibold text-gray-600">Belum ada paket wisata</h1>
            </div>
        @else
        <x-sweeper-header
            link="{{ route('paket-wisata') }}"
            linkText="lihat semua"
            swiperClass="wisata-swiper"
            slidesPerView="1"
        >
            @foreach ($paketWisatas as $index => $paketWisata)
                <div class="swiper-slide" wire:key="product-mobile-{{ $paketWisata->id }}">
                    <x-card-wisata :paketWisata="$paketWisata " :index="$index" />
                </div>
            @endforeach
        </x-sweeper-header>
    @endif
    <div wire:loading.class="opacity-50" class="hidden md:flex flex-col gap-8">
        @foreach ($paketWisatas as $index => $paketWisata)
            <x-card-wisata :paketWisata="$paketWisata" :index="$index" wire:key="paketWisata-{{ $paketWisata->id }}"/>
        @endforeach
    </div>
</section>