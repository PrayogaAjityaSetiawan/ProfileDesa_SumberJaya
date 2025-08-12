<section class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mt-30 md:mx-auto selection:bg-[#05426F] selection:text-white">
    <div class="flex flex-col text-center gap-2 mx-auto mb-8">
        <h1 class="text-2xl sm:text-3xl md:text-4xl  font-bold text-gray-800">Visi dan Misi</h1>
        <div class="w-full text-sm md:text-base text-gray-600 md:w-1/2 mx-auto">
            <p>Visi dan misi Desa Sumberjaya</p>
        </div>
    </div>
    <!-- Visi Misi Section -->
    @if(isset($visiMisi) && $visiMisi)
        <div class="mb-20">        
            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
                <!-- Visi Card -->
                <div class="bg-white rounded-2xl transition-all duration-300 p-4 md:p-8 border-[1px] border-gray-200 transform hover:-translate-y-1">
                    <div class="mb-6">
                        <h2 class="text-xl md:text-2xl font-semibold text-[#053D69] mb-4 flex items-center">
                            <div class="bg-[#053D69] p-2 rounded-lg mr-3 transition-colors duration-300">
                                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            Visi
                        </h2>
                        <div class="w-12 h-0.5 bg-[#053D69] rounded-full"></div>
                    </div>
                    
                    <blockquote class="text-gray-700 leading-relaxed text-sm md:text-base 2xl:text-lg italic relative">
                        <div class="absolute -top-2 -left-2 text-4xl text-blue-200 font-serif">"</div>
                        <p class="relative z-10 pl-4">
                            {{ $visiMisi->visi ?? 'Visi belum tersedia saat ini.' }}
                        </p>
                        <div class="absolute -bottom-4 -right-2 text-4xl text-blue-200 font-serif">"</div>
                    </blockquote>
                </div>

                <!-- Misi Card -->
                <div class="bg-white rounded-2xl transition-all duration-300 p-4 md:p-8 border-[1px] border-gray-200 transform hover:-translate-y-1">
                    <div class="mb-6">
                        <h2 class="text-xl md:text-2xl font-semibold text-[#7EB849] mb-4 flex items-center">
                            <div class="bg-[#7EB849] p-2 rounded-lg mr-3 transition-colors duration-300">
                                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            Misi
                        </h2>
                        <div class="w-12 h-0.5 bg-[#7EB849] rounded-full"></div>
                    </div>
                    
                    <div class="text-gray-700 leading-relaxed prose prose-sm md:prose-base 2xl:prose-lg max-w-none">
                        @if(isset($visiMisi->misi) && !empty($visiMisi->misi))
                            {!! str($visiMisi->misi)->sanitizeHtml() !!}
                        @else
                            <p class="text-gray-500 italic">Misi belum tersedia saat ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="mb-20">        
            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
                <div class="bg-white rounded-2xl transition-all duration-300 p-4 md:p-8 border-[1px] border-gray-200">
                    <div class="mb-6">
                        <h2 class="text-xl md:text-2xl font-semibold text-[#053D69] mb-4 flex items-center">
                            <div class="bg-[#053D69] p-2 rounded-lg mr-3 transition-colors duration-300">
                                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            Visi
                        </h2>
                        <div class="w-12 h-0.5 bg-[#053D69] rounded-full"></div>
                    </div>
                    
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-sm">Visi belum tersedia saat ini.</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl transition-all duration-300 p-4 md:p-8 border-[1px] border-gray-200">
                    <div class="mb-6">
                        <h2 class="text-xl md:text-2xl font-semibold text-[#7EB849] mb-4 flex items-center">
                            <div class="bg-[#7EB849] p-2 rounded-lg mr-3 transition-colors duration-300">
                                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            Misi
                        </h2>
                        <div class="w-12 h-0.5 bg-[#7EB849] rounded-full"></div>
                    </div>
                    
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-sm">Misi belum tersedia saat ini.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Perangkat Desa Section -->
    <div>
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-4xl font-bold text-gray-800 mb-4">Perangkat Desa</h2>
            <p class="text-gray-600 text-sm md:text-base 2xl:text-lg max-w-2xl mx-auto">
                Tim dedicated yang berkomitmen untuk melayani dan memajukan desa
            </p>
        </div>
        
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
            @if(isset($perangkatDesas) && $perangkatDesas->count() > 0)
                @foreach ($perangkatDesas as $perangkat)           
                    <x-card-perangkat :perangkat="$perangkat" wire:key="perangkat-{{ $perangkat->id }}" />       
                @endforeach
            @else
                <div class="col-span-full text-center py-12">
                    <div class="bg-gray-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-600 mb-2">
                        @if(!isset($perangkatDesas))
                            Data Perangkat Tidak Tersedia
                        @else
                            Belum Ada Data Perangkat
                        @endif
                    </h3>
                    <p class="text-gray-500 text-sm">
                        @if(!isset($perangkatDesas))
                            Terjadi kesalahan dalam memuat data perangkat desa
                        @else
                            Data perangkat desa akan segera ditampilkan
                        @endif
                    </p>
                </div>
            @endif
        </div>
        
        @if(isset($perangkatDesas) && $perangkatDesas->count() > 0)
            <div class="text-center mt-12">
                <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-full text-sm md:text-base 2xl:text-lg text-gray-600">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Total {{ $perangkatDesas->count() }} Perangkat Desa
                </div>
            </div>
        @endif
    </div>
</section>