<section>
        <div class="relative overflow-hidden ">
            @if (isset($section->gambar) && !empty($section->gambar))      
                <img class="w-full rounded-b-2xl h-screen object-cover" src="{{ asset('storage/' . $section->gambar) }}" alt="Cover" />
            @endif
            <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-center max-w-4xl px-4">
                <h1 class=" text-5xl font-bold uppercase mb-4">{{ $section->judul }}</h1>
                <div class="reveal-text overflow-hidden text-justify max-w-2xl mx-auto">
                    {!! $section->deskripsi !!}
                </div>
            </div>
            <div class="absolute z-10 bottom-4 left-1/2 -translate-x-1/2 text-white">
                <svg class="animate-bounce w-8 h-8 mx-auto" "  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M16 15l-4 4" /><path d="M8 15l4 4" /></svg>
            </div>
            <div class="absolute rounded-b-2xl top-0 left-0 w-full h-full bg-[#053D69] opacity-50"></div>
            <div class="absolute bg-gradient-to-b from-gray-900 via-gray-900/50 to-transparent inset-0"></div>            
        </div>
</section>