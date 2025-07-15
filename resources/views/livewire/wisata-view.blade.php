<div class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto mt-30">
    <div class="flex flex-col gap-8">
        @foreach ($paketWisatas as $index => $paketWisata)
                    <div class="swiper-slide" wire:key="product-mobile-{{ $paketWisata->id }}">
                        <x-card-wisata :paketWisata="$paketWisata " :index="$index" />
                    </div>
         @endforeach
    </div>
</div>
