<div class='md:w-[80%] 2xl:w-[70%] px-4 mx-auto pt-20 selection:bg-[#05426F] selection:text-white'>   
    <div>
        <div class="text-center mt-5 mb-8">
            <h1 class="text-xl md:text-3xl font-bold text-gray-800">Produk UMKM Sumberjaya</h1>
            <div class="w-full md:w-1/2 mt-4 text-sm md:text-base text-gray-600 mx-auto">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam perferendis ea dicta deserunt autem ipsa! Repellat accusantium ducimus</p>
            </div>
        </div>
        <div class="space-y-8">
            @foreach ($products as $index => $product)
                <div class="grid grid-cols-1 items-stretch md:grid-cols-2 gap-0 overflow-hidden rounded-2xl group cursor-pointer border border-gray-200">
                    @if ($index % 2 == 0)
                        <div class="relative aspect-[16/9] overflow-hidden">
                            <img class="object-cover h-full w-full group-hover:scale-105 transition-transform duration-300" 
                                src="{{ asset('storage/' . $product->gambar) }}" 
                                alt="{{ $product->nama }}">
                            <div class="absolute  inset-0 bg-gradient-to-t md:bg-gradient-to-l from-white via-white-100/50  to-transparent"></div>
                            <div class="hidden md:block absolute opacity-0 group-hover:opacity-100 transition-all ease-in-out duration-300 z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <a href="{{ route('produkDetail', $product->slug) }}" 
                                class="bg-[#053D69] hover:bg-[#042b4d] text-white font-bold py-2 px-4 rounded-lg text-sm shadow-lg transition-colors duration-200">
                                    Detail Produk
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex flex-col justify-center gap-4 p-6 bg-white">
                            <div class="flex justify-between items-center gap-2">
                                <h1 class="text-lg capitalize md:text-2xl font-bold text-gray-800 line-clamp-2">{{ $product->nama }}</h1>
                                <span class="text-base md:text-lg font-semibold text-green-600">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="text-sm md:text-base text-gray-600 leading-relaxed line-clamp-3">
                                <p>{!! str($product->deskripsi)->sanitizeHtml() !!}</p>
                            </div>
                            <a href="{{ route('produkDetail', $product->slug) }}" class="md:hidden bg-[#053D69] hover:bg-[#042b4d] text-white font-bold py-2 px-4 rounded-lg text-sm shadow-lg transition-colors duration-200">Lihat Detail</a>
                        </div>
                    @else
                        <div class="p-6 flex flex-col justify-center gap-4 bg-white">
                            <div class="flex justify-between items-center gap-2">
                                <h1 class="text-lg capitalize md:text-2xl font-bold text-gray-800 line-clamp-2">{{ $product->nama }}</h1>
                                <span class="text-base md:text-lg font-semibold text-green-600">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="text-sm md:text-base text-gray-600 leading-relaxed line-clamp-3">
                                <p>{!! str($product->deskripsi)->sanitizeHtml() !!}</p>
                            </div>
                            <a href="{{ route('produkDetail', $product->slug) }}" class="md:hidden bg-[#053D69] hover:bg-[#042b4d] text-white font-bold py-2 px-4 rounded-lg text-sm shadow-lg transition-colors duration-200">Lihat Detail</a>
                        </div>
                        
                        <div class="relative order-first md:order-last aspect-[16/9] overflow-hidden">
                            <img class="h-full object-cover w-full group-hover:scale-105 transition-transform duration-300" 
                                 src="{{ asset('storage/' . $product->gambar) }}" 
                                 alt="{{ $product->nama }}">
                            <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-white via-white-100/50  to-transparent"></div>
                            <div class="hidden md:block absolute opacity-0 group-hover:opacity-100 transition-all ease-in-out duration-300 z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <a href="{{ route('produkDetail', $product->slug) }}" 
                                class="bg-[#053D69] hover:bg-[#042b4d] text-white font-bold py-2 px-4 rounded-lg text-sm shadow-lg transition-colors duration-200">
                                    Detail Produk
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach

            <div class="mt-4">
    {{ $products->links() }}
</div>
        </div>
        @if(count($products) == 0)
        <div class="text-center py-16">
            <div class="max-w-md mx-auto">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-600">Produk UMKM akan segera hadir di sini.</p>
            </div>
        </div>
        @endif
    </div>
</div>