@if(isset($about) && $about)
<section class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto my-20">
    <div class="bg-white rounded-2xl overflow-hidden">
        <div class="flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/2 relative">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9432177321555!2d105.5870879!3d-6.6539605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e43bb58a837200b%3A0xb9de9fd7a2c83232!2sSaung%20Legon!5e0!3m2!1sid!2sid!4v1748776421171!5m2!1sid!2sid"  
                        class="w-full h-64 sm:h-80 md:h-96 lg:h-full lg:min-h-[500px]"
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black/10 lg:to-white/20 pointer-events-none"></div>
            </div>
            <div class="flex flex-col justify-center gap-6 w-full lg:w-1/2 md:p-8 lg:p-12">
                <div class="w-16 h-1 bg-blue-600 rounded-full"></div>
                <div class="overflow-hidden">
                    <h1 class="reveal-text text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 leading-tight">
                        {{ $about->judul ?? 'Judul Tidak Tersedia' }}
                    </h1>
                </div>
                <div class="overflow-hidden">
                    <div class="reveal-text text-justify text-gray-600 leading-relaxed text-sm md:text-base 2xl:text-lg">
                        @if(isset($about) && $about->deskripsi)
                            {!! str($about->deskripsi)->sanitizeHtml() !!}
                        @else
                            <p>Deskripsi tidak tersedia saat ini.</p>
                        @endif
                    </div>
                </div>
                <div class="overflow-hidden">
                    <a href="{{ route('sejarah') }}" wire:navigate 
                    class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 w-fit text-sm md:text-base group">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto my-20">
    <div class="bg-white rounded-2xl overflow-hidden p-8 text-center">
        <div class="text-gray-500">
            <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-800 mb-2">Data Tidak Tersedia</h3>
            <p class="text-gray-600">Informasi about belum tersedia saat ini.</p>
        </div>
    </div>
</section>
@endif