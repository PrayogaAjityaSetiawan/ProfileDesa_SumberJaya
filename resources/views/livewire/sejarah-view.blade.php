<div class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto mt-30">
    <div class="mb-8">
        <img 
            src="{{ asset('storage/' . $sejarah->gambar) }}"
            alt="{{ $sejarah->judul }}"
            class="w-full h-64 md:h-[500px] object-cover bg-center rounded-2xl"
            loading="lazy"
        >
    </div>
    
    <header class="mb-6">
        <h1 class="text-xl text-center md:text-3xl font-bold text-gray-900 leading-tight">
            {{ $sejarah->judul }}
        </h1>
    </header>
    
    <article >
        <div class="prose prose-sm md:prose-base 2xl:prose-lg max-w-none mx-auto text-gray-800 leading-relaxed text-justify">
            {!! $sejarah->deskripsi !!}
        </div>
    </article>
</div>