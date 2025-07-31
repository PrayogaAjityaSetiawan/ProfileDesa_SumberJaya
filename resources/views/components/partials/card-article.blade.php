<a href="{{ route('blogDetail', $article->slug) }}" wire:navigate class="relative flex flex-col group rounded-2xl  overflow-hidden transition-shadow duration-300 bg-white border-[1px] border-gray-200 ">
    @if($article->image)
        <div class="overflow-hidden">
            <img class="w-full h-72  object-cover group-hover:scale-105 transition-transform duration-300" 
                src="{{ asset('storage/' . $article->image) }}" 
                alt="{{ $article->title }}"
                loading="lazy">
        </div>
    @endif
    
    <div class="absolute bottom-0 left-0 right-0 p-4 bg-black/50 backdrop-blur-xl rounded-t-2xl transform translate-y-0 group-hover:translate-y-[-1] transition-transform  duration-500 text-white">
        <div class="flex-grow">
            <h3 class="text-sm capitalize md:text-xl font-semibold line-clamp-2 mb-3">
                {{ $article->title }}
            </h3>
            
            <div  class="block md:hidden md:group-hover:block text-[10px] 2xl:text-base line-clamp-3 mb-4">
                <span>
                    {{ \Illuminate\Support\Str::words(strip_tags($article->content), 5, '...') }}
                </span>
            </div>

        </div>
    </div>
</a>