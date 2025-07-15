@props([
    'title' => '',
    'description' => '',
    'link' => null,
    'linkText' => ''
])

<div class="flex justify-between items-center md:text-start text-center overflow-hidden mb-8">
    <div class="flex flex-col overflow-hidden">
        <div class="overflow-hidden">
            <h1 class="reveal-text md:text-start text-center text-xl md:text-3xl font-bold text-gray-800 mb-4">{{ $title }}</h1>
        </div>
        <p class="text-sm md:text-base 2xl:text-lg text-gray-600 leading-relaxed md:max-w-xl">
            {{ $description }}
        </p>
    </div>
    @if($link)
        <div class="overflow-hidden hidden md:block px-4 py-2 rounded-full ">
                    <a href="{{ $link }}" wire:navigate 
                       class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 w-fit text-sm 2xl:text-base group">
                        <span class="font-bold">{{ $linkText ?? 'Lihat Semua' }}</span>
                        <svg class="w-5 h-5 font-bold transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
    @endif
</div>