<div class="md:w-[80%] 2xl:w-[70%] mx-auto px-4 sm:px-6 lg:px-8 mt-30 selection:bg-[#05426F] selection:text-white">
    <div class="text-center mb-12">
        <h1 class="text-2xl sm:text-3xl md:text-4xl  font-bold text-gray-800 mb-4">Artikel & Berita</h1>
        <p class="text-gray-600 text-xs sm:text-sm md:text-base 2xl:text-lg max-w-2xl mx-auto">
            Dapatkan informasi terkini dan artikel menarik seputar desa
        </p>
    </div>

    <div class="mb-12">
        <div class="bg-white rounded-xl  border border-gray-100 p-6">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-[#05426F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                Filter Kategori
            </h2>
            
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('artikel') }}" 
                   wire:navigate
                   class="inline-flex items-center px-4 py-2 {{ !request('categorySlug') ? 'bg-[#05426F] text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }} rounded-full text-xs sm:text-sm font-medium transition-all duration-200 hover:shadow-md">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Semua Artikel
                </a>
                
                @foreach ($categories as $category)
                    <a href="{{ route('artikel') . '?categorySlug=' . $category->slug }}" 
                    wire:navigate
                    class="inline-flex items-center px-4 py-2 {{ request('categorySlug') === $category->slug ? 'bg-[#05426F] text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }} rounded-full text-xs sm:text-sm font-medium transition-all duration-200 hover:shadow-md">
                        {{ $category->name }}
                        @if(isset($category->articles_count))
                            <span class="ml-2 text-xs {{ request('categorySlug') === $category->slug ? 'bg-blue-400' : 'bg-gray-300' }} rounded-full px-2 py-0.5">
                                {{ $category->articles_count }}
                            </span>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mb-12">
        <div>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                @if(request('categorySlug'))
                    {{ $categories->firstWhere('slug', request('categorySlug'))->name ?? 'Kategori' }}
                @else
                    Semua Artikel
                @endif
            </h2>
            @if($articles->total() > 0)
                <p class="text-gray-600 text-xs sm:text-sm md:text-base">
                    Menampilkan {{ $articles->firstItem() }}-{{ $articles->lastItem() }} dari {{ $articles->total() }} artikel
                </p>
            @endif
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">

        <div class="grid grid-cols-2 md:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-6 lg:gap-8">
            @forelse ($articles as $article)
                <div class="group">
                    <x-card-article :article="$article" />
                </div>
            @empty

                <div class="col-span-full">
                    <div class="text-center py-16">
                        <div class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-600 mb-2">Tidak Ada Artikel</h3>
                        <p class="text-gray-500 mb-6 text-sm sm:text-base">
                            @if(request('categorySlug'))
                                Belum ada artikel dalam kategori ini.
                            @else
                                Belum ada artikel yang dipublikasikan.
                            @endif
                        </p>
                        @if(request('categorySlug'))
                            <a href="{{ route('artikel') }}" 
                            class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Lihat Semua Artikel
                            </a>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Pagination -->
    @if($articles->hasPages())
        {{ $articles->links() }}
    @endif
    </div>
</div>