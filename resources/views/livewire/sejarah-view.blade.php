@if(isset($sejarah) && $sejarah)
<div class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto mt-30 selection:bg-[#05426F] selection:text-white">
    <div class="relative overflow-hidden mb-8">
        @if(isset($sejarah->gambar) && !empty($sejarah->gambar))
            <img 
                src="{{ asset('storage/' . $sejarah->gambar) }}"
                alt="{{ $sejarah->judul ?? 'Sejarah Image' }}"
                class="w-full h-64 md:h-[500px] object-cover bg-center rounded-2xl"
                loading="lazy"
                onerror="this.style.display='none'; this.parentElement.classList.add('bg-gradient-to-br', 'from-gray-800', 'to-gray-900');"
            >
        @else
            <div class="w-full h-64 md:h-[500px] bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        @endif
        
        <div class="absolute inset-0 bg-black opacity-80 rounded-2xl"></div>
        <header class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <h1 class="text-[1.5rem] uppercase text-center md:text-3xl font-bold text-white leading-tight">
                {{ $sejarah->judul ?? 'Judul Tidak Tersedia' }}
            </h1>
        </header>
    </div>
    
    <article>
        <div class="prose prose-sm md:prose-base 2xl:prose-lg max-w-none mx-auto text-gray-800 leading-relaxed text-justify">
            @if(isset($sejarah->deskripsi) && !empty($sejarah->deskripsi))
                {!! $sejarah->deskripsi !!}
            @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-500">Konten sejarah belum tersedia saat ini.</p>
                </div>
            @endif
        </div>
    </article>
</div>
@else
<div class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto mt-30 selection:bg-[#05426F] selection:text-white">
    <div class="relative overflow-hidden mb-8">
        <div class="w-full h-64 md:h-[500px] bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl flex items-center justify-center">
            <svg  class="w-16 h-16 text-gray-400 mb-24 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        
        <div class="absolute inset-0 bg-black opacity-50 rounded-2xl"></div>
        <header class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <h1 class="text-[1.5rem] uppercase text-center md:text-3xl font-bold text-white leading-tight">
                Data Tidak Tersedia
            </h1>
        </header>
    </div>
    
    <article>
        <div class="prose prose-sm md:prose-base 2xl:prose-lg max-w-none mx-auto text-gray-800 leading-relaxed text-justify">
            <div class="text-center py-8">
                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="text-gray-500">Data sejarah belum tersedia saat ini.</p>
            </div>
        </div>
    </article>
</div>
@endif