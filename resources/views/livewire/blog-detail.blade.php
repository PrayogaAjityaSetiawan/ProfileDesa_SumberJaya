<article class="md:w-[80%] 2xl:w-[70%] px-4 mx-auto pt-30">
    <!-- Breadcrumb Navigation -->
    <nav class="mb-4 md:mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-xs md:text-sm text-gray-500">
            <li>
                <a href="{{ route('homepage') }}" class="hover:text-blue-600 transition-colors duration-200">
                    Beranda
                </a>
            </li>
            <li>
                <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </li>
            <li>
                <a href="{{ route('artikel') }}" class="hover:text-blue-600 transition-colors duration-200">
                    Artikel
                </a>
            </li>
            <li>
                <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </li>
            <li class="text-gray-800 font-medium truncate">
                {{ Str::limit($article->title, 50) }}
            </li>
        </ol>
    </nav>

    <!-- Article Header -->
    <header class="mb-6 md:mb-8">

        <!-- Article Title -->
        <h1 class="text-xl md:text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-4 md:mb-6">
            {{ $article->title }}
        </h1>

        <!-- Article Meta Information -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 md:gap-4 pb-4 md:pb-6 border-b border-gray-200">
            <div class="flex items-center space-x-3 md:space-x-4">
                <!-- Author -->
                <div class="flex items-center">
                    <div class="bg-gray-300 rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center mr-2 md:mr-3">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs md:text-sm font-medium text-gray-900">{{ $article->author }}</p>
                        <p class="text-xs text-gray-500">Penulis</p>
                    </div>
                </div>

                <!-- Date -->
                <div class="flex items-center text-xs md:text-sm text-gray-600">
                    <svg class="w-3 h-3 md:w-4 md:h-4 mr-1 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <time datetime="{{ $article->created_at->format('Y-m-d') }}">
                        {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
                    </time>
                    <span class="mx-1 md:mx-2">•</span>
                    <!-- Category Badge -->
                    @if($article->category_name)
                        <div class="flex items-center gap-2">
                            <span class="text-xs md:text-sm">Tag:</span>
                            <span class="inline-flex items-center px-2 md:px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                {{ $article->category_name }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
            {{-- <!-- Category Badge -->
        @if($article->category_name)
            <div class="flex items-center gap-2">
                <span class="text-xs md:text-sm">Tag:</span>
                <span class="inline-flex items-center px-2 md:px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    {{ $article->category_name }}
                </span>
            </div>
        @endif --}}
    </header>

    <!-- Featured Image -->
    @if($article->image)
        <div class="mb-6 md:mb-8 rounded-2xl overflow-hidden">
            <img class="w-full h-48 md:h-64 lg:h-80 xl:h-96 object-cover" 
                src="{{ asset('storage/' . $article->image) }}" 
                alt="{{ $article->title }}"
                loading="lazy">
        </div>
    @endif

    <!-- Article Content -->
    <div class="mb-8 md:mb-12">
        <div class="prose prose-sm md:prose-base 2xl:prose-lg max-w-none mx-auto text-gray-800 leading-relaxed text-justify">
            {!! $article->content !!}
        </div>
    </div>

    <!-- Latest Articles Section -->
    @if(isset($latestArticles) && count($latestArticles) > 0)
    <section class="mb-8 md:mb-12">
        <div class="border-t border-gray-200 pt-8 md:pt-12">
            <div class="mb-6 md:mb-8">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Artikel Terbaru</h2>
                <p class="text-sm md:text-base text-gray-600">Temukan artikel menarik lainnya</p>
            </div>

            <x-sweeper-header 
                link="{{ route('artikel') }}"
                linkText="lihat Artikel"
                swiperClass="latest-article-swiper"
            >
                @foreach ($latestArticles as $article)
                    <div class="swiper-slide" wire:key="latest-article-mobile-{{ $article->id }}">
                        <x-card-article :article="$article" />
                    </div>
                @endforeach
            </x-sweeper-header>
            
            <div class="hidden md:grid md:grid-cols-3 2xl:grid-cols-4 gap-6">
                @foreach ($latestArticles as $article)
                    <div wire:key="latest-article-{{ $article->id }}">
                        <x-card-article :article="$article" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</article>