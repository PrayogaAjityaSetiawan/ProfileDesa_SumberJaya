
<footer class=" bg-gradient-to-br from-[#053D69] via-[#064B7A] to-[#0A5A8A] text-white w-full mt-20 relative overflow-hidden ">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full -translate-y-48 translate-x-48"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full translate-y-32 -translate-x-32"></div>
    </div>
    
    <div class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto py-12 relative z-10">
        <div class="flex flex-col lg:flex-row justify-between gap-12">
            <div class="w-full lg:w-2/5 flex-shrink-0">
                <div class="w-40 mb-6">
                    @if (isset($setting->logo) && !empty($setting->logo))
                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="w-full h-auto " />
                    @endif
                </div>
                <p class="text-lg text-white/90 leading-relaxed mb-6">
                    Gerbang Menuju Surga Tropis Ujung Kulon
                </p>
                <p class="text-white/70 text-sm 2xl:text-base leading-relaxed">
                    Temukan keindahan alam yang memukau dan pengalaman tak terlupakan di destinasi wisata terbaik Indonesia.
                </p>
            
            </div>
            
            <div class="w-full lg:w-3/5 flex flex-col md:flex-row gap-8 lg:gap-12">
                <div class="flex-1">
                    <h3 class="text-xl font-bold mb-6 text-white relative">
                        Navigasi
                        <div class="absolute -bottom-2 left-0 w-12 h-1 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full"></div>
                    </h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('homepage') }}" class="text-white/80 hover:text-white hover:translate-x-2 transition-all duration-300 text-sm 2xl:text-base flex items-center group">
                                <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sejarah') }}" class="text-white/80 hover:text-white hover:translate-x-2 transition-all duration-300 text-sm 2xl:text-base  flex items-center group">
                                <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                Profil Desa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('produk') }}" class="text-white/80 hover:text-white hover:translate-x-2 transition-all duration-300 text-sm 2xl:text-base  flex items-center group">
                                <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('artikel') }}" class="text-white/80 hover:text-white hover:translate-x-2 transition-all duration-300 text-sm 2xl:text-base  flex items-center group">
                                <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                Pariwisata
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('artikel') }}" class="text-white/80 hover:text-white hover:translate-x-2 transition-all duration-300 text-sm 2xl:text-base  flex items-center group">
                                <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                Artikel
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('galeri') }}" class="text-white/80 hover:text-white hover:translate-x-2 transition-all duration-300 text-sm 2xl:text-base  flex items-center group">
                                <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                Galeri
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="flex-1">
                    <h3 class="text-xl font-bold mb-6 text-white relative">
                        Kontak Kami
                        <div class="absolute -bottom-2 left-0 w-12 h-1 bg-gradient-to-r from-green-400 to-emerald-400 rounded-full"></div>
                    </h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 2xl:w-10 2xl:h-10 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 2xl:w-5 2xl:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/90 font-semiboldtext-sm 2xl:text-base mb-1">Alamat</p>
                                <p class="text-white/80 text-sm 2xl:text-base  leading-relaxed">{{ $setting->alamat }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 2xl:w-10 2xl:h-10 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 2xl:w-5 2xl:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/90 font-semibold text-sm 2xl:text-base mb-1">Telepon</p>
                                <a href="tel:{{ $setting->telepon }}" class="text-white/80 hover:text-white transition-colors duration-200 text-sm 2xl:text-base ">
                                    {{ $setting->telepon }}
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 2xl:w-10 2xl:h-10 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 2xl:w-5 2xl:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/90 font-semibold text-sm 2xl:text-base mb-1">Email</p>
                                <a href="mailto:{{ $setting->email }}" class="text-white/80 hover:text-white transition-colors duration-200 text-sm 2xl:text-base ">
                                    {{ $setting->email }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="border-t border-white/20 mt-12 pt-8">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-sm 2xl:text-base ">
                <p class="text-white/70">
                    &copy; 2025 Serambi Ujung Kulon. All rights reserved.
                </p>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-white/70 hover:text-white transition-colors duration-200 flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                        KKN 2025
                    </a>
                    <a href="#" class="text-white/70 hover:text-white transition-colors duration-200 flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                        Universitas Budi Luhur
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>