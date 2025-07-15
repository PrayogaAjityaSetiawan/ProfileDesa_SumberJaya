<a href="{{ route('blogDetail', $article->slug) }}" wire:navigate class="group rounded-2xl block overflow-hidden transition-shadow duration-300 bg-white border-[1px] border-gray-200">
    @if($article->image)
        <div class="overflow-hidden">
            <img class="w-full rounded-2xl h-48 object-cover group-hover:scale-105 transition-transform duration-300" 
                src="{{ asset('storage/' . $article->image) }}" 
                alt="{{ $article->title }}"
                loading="lazy">
        </div>
    @endif
    
    <div class="p-4 flex flex-col h-full">
        <div class="flex-grow">
            <h3 class="text-xl font-semibold text-gray-800 line-clamp-2 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                {{ $article->title }}
            </h3>
            
            <div class="text-sm 2xl:text-base text-gray-600 line-clamp-3 mb-4">
                {{ \Illuminate\Support\Str::words(strip_tags($article->content), 15, '...') }}
            </div>
        </div>
        
        <div class="flex justify-between items-center text-xs text-gray-500 mt-auto">
            <time datetime="{{ $article->created_at->format('Y-m-d') }}">
                {{ $article->created_at->format('M j, Y') }}
            </time>
            <span>{{ $article->created_at->diffForHumans() }}</span>
        </div>
    </div>
</a>