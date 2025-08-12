<nav 
    x-data="{
        isScrolled: false,
        lastScrollY: 0,
        showNavbar: true,
        mobileMenuOpen: false,
        
        init() {
            this.handleScroll();
            window.addEventListener('scroll', () => this.handleScroll());
        },
        
        handleScroll() {
            const currentScrollY = window.pageYOffset;
            
            // ubah tampilan navbar ketika discroll
            if (currentScrollY > 50) {
                this.isScrolled = true;
            } else {
                this.isScrolled = false;
            }
            
            // hidden navbar ketika discroll ke bawah dan munculin navbar ketika scroll atas
            if (currentScrollY > 100) {
                if (currentScrollY > this.lastScrollY && currentScrollY > 300) {
                    this.showNavbar = false;
                } else {
                    this.showNavbar = true;
                }
            } else {
                this.showNavbar = true;
            }
            
            this.lastScrollY = currentScrollY;
        }
    }"
    id="navbar" 
    class="fixed top-0 left-0 right-0 z-50 p-2 transition-all duration-500 ease-in-out"
    x-cloak
    @if (Route::is('homepage'))
        :class="{ 'bg-[#054573] backdrop-blur-lg text-white': isScrolled }"
    @endif
    :class="{
        'transform -translate-y-full': !showNavbar,
        'transform translate-y-0': showNavbar,
        'bg-[#054573] backdrop-blur-lg text-white': isScrolled,
        'bg-[#054573] backdrop-blur-md text-white': !isScrolled
    }"
>
    <div class="md:w-[80%] 2xl:w-[70%] mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-2 transition-transform duration-300 hover:scale-105"> 
            @if (isset($setting->logo) && !empty($setting->logo))             
                <img 
                    class="w-16 transition-all duration-300" 
                    src="{{ asset('storage/' . $setting->logo) }}" 
                    alt="Logo" 
                />
            @endif  
            <div>
                <h1 class="text-lg font-semibold text-white">{{ $setting->judul }}</h1>
                <p class="text-sm font-semibold text-white">Kabupaten Pandeglang</p>
            </div>    
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center  text-md font-medium">
            <a href="{{ route('homepage') }}" 
               class="relative px-3 py-2 transition-all duration-300 hover:scale-105 {{ Route::is('homepage') ? 'text-blue-400 font-semibold' : '' }}"
               :class="isScrolled ? 'text-white' : 'text-white hover:text-gray-200'"
               wire:navigate>
                Beranda
                @if(Route::is('homepage'))
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white"></span>
                @endif
            </a>

            <!-- Dropdown Menu -->
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <button 
                    @click="open = !open" 
                    class="flex items-center justify-between px-3 py-2 rounded-md transition-all duration-300 hover:scale-105"
                    :class="isScrolled ? 'text-white' : 'text-white hover:text-gray-200'"
                >
                    Profil Desa
                    <svg 
                        :class="{ 'rotate-180': open }" 
                        class="w-4 h-4 ml-2 transition-transform duration-200" 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 20 20" 
                        fill="currentColor"
                    >
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div 
                    x-show="open" 
                    @click.outside="open = false"
                    x-cloak                   
                    class="absolute top-full left-0 text-sm w-52 bg-white/95 backdrop-blur-lg shadow-xl rounded-lg mt-2 z-50 overflow-hidden border border-gray-200/50"
                >
                    <a href="{{ route('tentang-desa') }}" 
                       class="block px-4 py-3 hover:scale-105 transition-all duration-300 {{ Route::is('tentang-desa') ? 'bg-[#054573] font-semibold ' : 'text-gray-700' }}" 
                       wire:navigate>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Tentang Desa
                        </div>
                    </a>
                    <a href="{{ route('sejarah') }}" 
                       class="block px-4 py-3 hover:scale-105 transition-all duration-300 {{ Route::is('sejarah') ? 'bg-[#054573] font-semibold ' : 'text-gray-700' }}" 
                       wire:navigate>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Sejarah Desa
                        </div>
                    </a>

                    <a href="{{ route('struktur-desa') }}" 
                       class="block px-4 py-3 hover:scale-105 transition-all duration-300  {{ Route::is('struktur-desa') ? 'font-semibold bg-[#054573]' : 'text-gray-700' }}" 
                       wire:navigate>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Struktur Desa
                        </div>
                    </a>

                    <a href="{{ route('infografis') }}" 
                       class="block px-4 py-3 hover:scale-105 transition-all duration-300 {{ Route::is('infografis') ? 'font-semibold bg-[#054573]' : 'text-gray-700' }}">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Infografis
                        </div>
                    </a>
                    <a href="{{ route('keuangan') }}" 
                       class="block px-4 py-3 hover:scale-105 transition-all duration-300 {{ Route::is('keuangan') ? 'font-semibold bg-[#054573]' : 'text-gray-700' }}">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M176 176C176 211.3 147.3 240 112 240L112 400C147.3 400 176 428.7 176 464L464 464C464 428.7 492.7 400 528 400L528 240C492.7 240 464 211.3 464 176L176 176zM64 192C64 156.7 92.7 128 128 128L512 128C547.3 128 576 156.7 576 192L576 448C576 483.3 547.3 512 512 512L128 512C92.7 512 64 483.3 64 448L64 192zM320 208C381.9 208 432 258.1 432 320C432 381.9 381.9 432 320 432C258.1 432 208 381.9 208 320C208 258.1 258.1 208 320 208zM304 252C293 252 284 261 284 272C284 281.7 290.9 289.7 300 291.6L300 340L296 340C285 340 276 349 276 360C276 371 285 380 296 380L344 380C355 380 364 371 364 360C364 349 355 340 344 340L340 340L340 272C340 261 331 252 320 252L304 252z"/></svg>
                            Keuangan
                        </div>
                    </a>
                    <a href="{{ route('sarana-prasarana') }}" 
                       wire:navigate
                       class="block px-4 py-3 hover:scale-105 transition-all duration-300 {{ Route::is('sarana-prasarana') ? 'font-semibold bg-[#054573]' : 'text-gray-700' }} ">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M9 8l1 0" /><path d="M9 12l1 0" /><path d="M9 16l1 0" /><path d="M14 8l1 0" /><path d="M14 12l1 0" /><path d="M14 16l1 0" /><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" /></svg>
                            Sarana & Prasarana
                        </div>
                    </a>
                    <a href="{{ route('lembaga') }}" 
                       wire:navigate
                       class="block px-4 py-3 hover:scale-105 transition-all duration-300 {{ Route::is('lembaga') ? 'font-semibold bg-[#054573]' : 'text-gray-700' }} ">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M9 8l1 0" /><path d="M9 12l1 0" /><path d="M9 16l1 0" /><path d="M14 8l1 0" /><path d="M14 12l1 0" /><path d="M14 16l1 0" /><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" /></svg>
                            Lembaga
                        </div>
                    </a>
                </div>
            </div>

            <a href="{{ route('produk') }}" 
               class="relative px-3 py-2 transition-all duration-300 hover:scale-105 {{ Route::is('produk') ? 'text-blue-400 font-semibold' : '' }}"
               :class="isScrolled ? 'text-white ' : 'text-white hover:text-gray-200'"
               wire:navigate>
                UMKM
                @if(Route::is('produk'))
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white"></span>
                @endif
            </a>

            <a target="_blank" href="https://serambiujungkulon.com/" 
               class="relative px-3 py-2 transition-all duration-300 hover:scale-105"
               :class="isScrolled ? 'text-white' : 'text-white hover:text-gray-200'"
               >
                Pariwisata
            </a>

            <a href="{{ route('artikel') }}" 
               class="relative px-3 py-2 transition-all duration-300 hover:scale-105 {{ Route::is('artikel') ? 'text-blue-400 font-semibold' : '' }}"
               :class="isScrolled ? 'text-white' : 'text-white hover:text-gray-200'"
               wire:navigate>
                Artikel
                @if(Route::is('artikel'))
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white"></span>
                @endif
            </a>

            <a href="{{ route('galeri') }}" 
               class="relative px-3 py-2 transition-all duration-300 hover:scale-105 {{ Route::is('galeri') ? 'text-blue-400 font-semibold' : '' }}"
               :class="isScrolled ? 'text-white' : 'text-white hover:text-gray-200'"
               wire:navigate>
                Galeri
                @if(Route::is('galeri'))
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white"></span>
                @endif
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button 
    @click="mobileMenuOpen = !mobileMenuOpen" 
    x-cloak           
    class="md:hidden text-2xl p-2 rounded-lg transition-all duration-300 hover:bg-white/10"
    :class="isScrolled ? 'text-gray-800' : 'text-white'"
>
    <svg 
        x-show="!mobileMenuOpen"
        xmlns="http://www.w3.org/2000/svg" 
        width="24" 
        height="24" 
        viewBox="0 0 24 24" 
        fill="none" 
        stroke="currentColor" 
        stroke-width="2" 
        stroke-linecap="round" 
        stroke-linejoin="round" 
        class="transition-transform duration-300"
    >
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M4 6h16" />
        <path d="M7 12h13" />
        <path d="M10 18h10" />
    </svg>
    <svg 
        x-show="mobileMenuOpen"
        xmlns="http://www.w3.org/2000/svg" 
        width="24" 
        height="24" 
        viewBox="0 0 24 24" 
        fill="none" 
        stroke="currentColor" 
        stroke-width="2" 
        stroke-linecap="round" 
        stroke-linejoin="round" 
        class="transition-transform duration-300"
    >
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M18 6L6 18" />
        <path d="M6 6l12 12" />
    </svg>
</button>

    </div>

    <!-- Mobile Menu -->
    <div 
        x-show="mobileMenuOpen"
        {{-- @click.away="mobileMenuOpen = false" --}}
        x-cloak
        class="w-full h-full md:hidden mt-2 bg-white/95 backdrop-blur-lg rounded-lg shadow-xl border border-gray-200/50 overflow-hidden"
    >
        <div class="py-4 space-y-2">
            <a href="{{ route('homepage') }}" 
               class="block px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200 {{ Route::is('homepage') ? 'text-blue-600 font-semibold bg-blue-50' : '' }}" 
               wire:navigate 
               @click="mobileMenuOpen = false">
                Beranda
            </a>
            
            <div class="px-6 py-2">
                <div class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Profil Desa</div>
                <div class="mt-2 ml-4 space-y-2">
                    <a href="{{ route('sejarah') }}" 
                       class="block py-2 text-gray-600 hover:text-blue-600 transition-colors duration-200 {{ Route::is('sejarah') ? 'text-blue-600 font-semibold' : '' }}" 
                       wire:navigate 
                       @click="mobileMenuOpen = false">
                        Sejarah
                    </a>
                    <a href="{{ route('struktur-desa') }}" 
                       class="block py-2 text-gray-600 hover:text-blue-600 transition-colors duration-200 {{ Route::is('struktur-desa') ? 'text-blue-600 font-semibold' : '' }}" 
                       wire:navigate 
                       @click="mobileMenuOpen = false">
                        Struktur Desa
                    </a>
                    <a href="{{ route('infografis') }}" 
                       class="block py-2 text-gray-600 hover:text-blue-600 transition-colors duration-200" 
                       @click="mobileMenuOpen = false">
                        Infografis
                    </a>
                    <a href="{{ route('keuangan') }}" 
                       class="block py-2 text-gray-600 hover:text-blue-600 transition-colors duration-200" 
                       @click="mobileMenuOpen = false">
                        Keuangan
                    </a>
                    <a href="{{ route('sarana-prasarana') }}"
                        wire:navigate
                       class="block py-2 text-gray-600 hover:text-blue-600 transition-colors duration-200" 
                       @click="mobileMenuOpen = false">
                        Sarana dan Prasarana
                    </a>
                </div>
            </div>
            
            <a href="{{ route('produk') }}" 
                class="block px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200 {{ Route::is('produk') ? 'text-blue-600 font-semibold bg-blue-50' : '' }}" 
                wire:navigate 
               @click="mobileMenuOpen = false">
                Produk
            </a>
            <a target="_blank" href="https://serambiujungkulon.com/" 
                class="block px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200 " 
                @click="mobileMenuOpen = false">
                Pariwisata
            </a>
            <a href="{{ route('artikel') }}" 
                class="block px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200 {{ Route::is('artikel') ? 'text-blue-600 font-semibold bg-blue-50' : '' }}" 
                wire:navigate 
                @click="mobileMenuOpen = false">
                Artikel
            </a>
            <a href="{{ route('galeri') }}" 
                class="block px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200 {{ Route::is('kontak') ? 'text-blue-600 font-semibold bg-blue-50' : '' }}" 
               wire:navigate 
               @click="mobileMenuOpen = false">
                Galeri
            </a>
        </div>
    </div>
</nav>