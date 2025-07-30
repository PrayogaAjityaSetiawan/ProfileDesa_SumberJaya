@props([
    'link' => null,
    'linkText' => '',
    'swiperClass' => '',
    'slidesPerView' => '1',
    'navigation' => true
])

<div class="block md:hidden " data-swiper-container>
    <div class="swiper {{ $swiperClass }}" wire:ignore data-slides-per-view="{{ $slidesPerView }}" >
        <div class="swiper-wrapper">
            {{ $slot }}
        </div>
        @if ($navigation)
            <div class="flex items-center justify-between px-2 pt-2">
                <div class="flex items-center gap-3">
                    <button class="button-prev group cursor-pointer bg-black/60 hover:bg-black/80 p-3 rounded-lg text-white transition-all duration-200 hover:scale-105 active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            width="20" height="20"
                             viewBox="0 0 24 24" 
                             fill="none" 
                             stroke="currentColor"
                             stroke-width="2.5" 
                             stroke-linecap="round" 
                             stroke-linejoin="round"
                             class="transition-transform duration-200 group-hover:-translate-x-1">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12h14" />
                            <path d="M5 12l4 4" />
                            <path d="M5 12l4 -4" />
                        </svg>
                    </button>
                    
                    <button class="button-next group cursor-pointer bg-black/60 hover:bg-black/80 p-3 rounded-lg text-white transition-all duration-200 hover:scale-105 active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             width="20" height="20"
                             viewBox="0 0 24 24" 
                             fill="none" 
                             stroke="currentColor"
                             stroke-width="2.5" 
                             stroke-linecap="round" 
                             stroke-linejoin="round"
                             class="transition-transform duration-200 group-hover:translate-x-1">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12h14" />
                            <path d="M15 16l4 -4" />
                            <path d="M15 8l4 4" />
                        </svg>
                    </button>
                </div>
            
                @if($link)
                    <div class="overflow-hidden md:hidden block px-4 py-2 rounded-full ">
                    <a href="{{ $link }}" wire:navigate 
                       class="inline-flex items-center gap-2 text-[#054573] w-fit text-sm sm:text-base group">
                        <span class="font-bold">{{ $linkText ?? 'Lihat Semua' }}</span>
                        <svg class="w-5 h-5 font-bold transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
                @endif
            </div>
        @endif
    </div>
</div>
