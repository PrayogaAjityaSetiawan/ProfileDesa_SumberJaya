<section class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto">
    <x-header-section 
        title="Artikel & Berita" 
        description="Berikut ini paket wisata serambi ujung kulon yang akan membuat anda merasakan pengalaman baru" 
        link="{{ route('artikel') }}" 
        linkText="lihat semua" 
    />
        @if ($articles->isEmpty())
            <div class="text-center py-10">
                <h1 class="text-xl font-semibold text-gray-600">Belum ada artikel</h1>
            </div>
        @else
        {{-- Artikel Mobile --}}
        <x-sweeper-header 
            link="{{ route('artikel') }}"
            linkText="lihat semua"
            swiperClass="artikel-swiper"
        >
            @foreach ($articles as $article)
                <div class="swiper-slide" wire:key="article-mobile-{{ $article->id }}">
                    <x-card-article :article="$article" />
                </div>
            @endforeach
        </x-sweeper-header>
        {{-- Artikel Desktop --}}
        <div class="hidden md:grid grid-cols-3 2xl:grid-cols-4 gap-6 mt-8">
            @foreach ($articles as $article)
                <x-card-article :article="$article" wire:key="article-{{ $article->id }}" />
            @endforeach
        </div>
    @endif
</section>
