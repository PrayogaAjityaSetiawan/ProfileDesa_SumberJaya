<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }} | Desa SumberJaya</title>
        <link rel="icon" href="{{ asset('favicon-32x32.png') }}">
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            [x-cloak] 
            { display: none !important; }
        </style>
    </head>
    <body id="body">
        <x-navbar/>
            {{ $slot }}
            <div 
            x-data="{ 
                showButton: false,
                scrollToTop() {
                    window.scrollTo({ top: 0, behavior: 'smooth' });               
                }
            }"
            x-init="
                window.addEventListener('scroll', () => {
                    showButton = window.pageYOffset > 300;
                });
            "
            class="fixed bottom-8 right-8 z-50"
        >
            <button
                x-show="showButton"
                @click="scrollToTop()"
                class="inline-flex items-center justify-center w-12 h-12 
                       bg-slate-900/80 hover:bg-slate-900 
                       text-white rounded-md shadow-lg hover:shadow-xl 
                       transform hover:scale-105 transition-all duration-300 ease-out
                       backdrop-blur-sm border border-white/10
                       focus:outline-none focus:ring-4 focus:ring-slate-500 focus:ring-opacity-50"
                aria-label="Kembali ke atas"
            >
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="20" 
                    height="20" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2.5" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"
                    class="transform hover:-translate-y-0.5 transition-transform duration-200"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 5l0 14" />
                    <path d="M16 9l-4 -4" />
                    <path d="M8 9l4 -4" />
                </svg>
            </button>
        </div>
        <x-footer/>
        @livewireScripts
        @livewireScriptConfig 
        {{-- <script src="https://unpkg.com/split-type"></script> --}}
        <!-- GSAP Core -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script> --}}
        <!-- GSAP ScrollTrigger Plugin -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>    --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}
    </body>
</html>