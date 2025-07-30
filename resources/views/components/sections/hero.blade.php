@if(isset($section) && $section)
<section>
    <div class="relative overflow-hidden">
        @if (isset($section->gambar) && !empty($section->gambar))      
            <img class="w-full rounded-b-2xl h-screen object-cover" 
                 src="{{ asset('storage/' . $section->gambar) }}" 
                 alt="Cover"
                 onerror="this.style.display='none'; this.parentElement.classList.add('bg-gray-800');" />
        @else
            <div class="w-full rounded-b-2xl h-screen bg-gradient-to-br from-gray-800 to-gray-900"></div>
        @endif
        
        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-center max-w-4xl px-4">
            <h1 class="text-5xl font-bold uppercase mb-4">
                {{ $section->judul ?? 'Judul Tidak Tersedia' }}
            </h1>
            <div class="reveal-text overflow-hidden text-justify max-w-2xl mx-auto">
                @if(isset($section->deskripsi) && !empty($section->deskripsi))
                    {!! $section->deskripsi !!}
                @else
                    <p>Deskripsi tidak tersedia saat ini.</p>
                @endif
            </div>
        </div>
        
        <div class="absolute z-10 bottom-4 left-1/2 -translate-x-1/2 text-white">
            <svg class="animate-bounce w-8 h-8 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-down">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 5l0 14" />
                <path d="M16 15l-4 4" />
                <path d="M8 15l4 4" />
            </svg>
        </div>
        
        {{-- <div class="absolute rounded-b-2xl top-0 left-0 w-full h-full bg-[#053D69] opacity-50"></div> --}}
        {{-- <div class="absolute bg-gradient-to-b from-gray-900 via-gray-900/50 to-transparent inset-0"></div>             --}}
        <div class="absolute bg-black opacity-80 inset-0"></div>
    </div>
</section>
@else
<section>
    <div class="relative overflow-hidden">
        <div class="w-full  h-screen bg-gradient-to-br from-gray-800 to-gray-900"></div>
        
        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-center max-w-4xl px-4">
            <div class="mb-8">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="text-3xl font-bold uppercase mb-4">Data Tidak Tersedia</h1>
                <p class="text-gray-300">Konten section belum tersedia saat ini.</p>
            </div>
        </div>
        
        <div class="absolute z-10 bottom-4 left-1/2 -translate-x-1/2 text-white">
            <svg class="animate-bounce w-8 h-8 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-down">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 5l0 14" />
                <path d="M16 15l-4 4" />
                <path d="M8 15l4 4" />
            </svg>
        </div>
        
        <div class="absolute  top-0 left-0 w-full h-full bg-[#053D69] opacity-50"></div>
        <div class="absolute bg-gradient-to-b from-gray-900 via-gray-900/50 to-transparent inset-0"></div>            
    </div>
</section>
@endif