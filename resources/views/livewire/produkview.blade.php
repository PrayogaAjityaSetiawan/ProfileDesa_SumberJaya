<div class='md:w-[80%] 2xl:w-[70%] mx-5 md:mx-auto mt-30'>
    <div>
        <div class="text-start mb-6">
            <h1 class="text-xl md:text-3xl font-bold">Produk UMKM Sumberjaya</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam perferendis ea dicta deserunt autem ipsa! Repellat accusantium ducimus, minus nam consequuntur.</p>
        </div>
        <div class="space-y-6">
            @foreach ($products as $index => $product)
            <div class="grid grid-cols-1 items-stretch md:grid-cols-2 gap-2  overflow-hidden rounded-2xl group cursor-pointer border border-gray-200">
                    @if ($index % 2 == 0)
                                     <div class="relative aspect-[16/9]">
                            <img class=" object-cover h-full  w-full" src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}">
                            <div class="absolute  inset-0 bg-gradient-to-t md:bg-gradient-to-l from-white via-white-100/50  to-transparent"></div>
                            <div class="absolute hidden group-hover:block opacity-0 group-hover:opacity-100 transition-all ease-in duration-300 z-10  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <a href="{{ route('produkDetail', $product->slug) }}" class="bg-[#053D69] text-white font-bold py-2 px-4 rounded text-sm">Detail Produk<a/>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center gap-6 p-4">
                            <h1 class="text-lg capitalize md:text-2xl font-bold text-gray-800">{{ $product->nama }}</h1>
                            <span class="text-base md:text-lg font-semibold text-green-600">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                            <div class="text-sm md:text-base 2xl:text-lg mt-0 text-gray-600 leading-relaxed">
                                <p>{!! str($product->deskripsi)->sanitizeHtml() !!}</p>
                            </div>
                        </div>
                    @else
                        <div class="p-6 flex flex-col justify-center gap-6">
                            <h1 class="text-lg capitalize md:text-2xl font-bold text-gray-800">{{ $product->nama }}</h1>
                            <span class="text-base md:text-lg font-semibold text-green-600">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                            <div class="text-sm md:text-base mt-0 text-gray-600 leading-relaxed">
                                <p>{!! str($product->deskripsi)->sanitizeHtml() !!}</p>
                            </div>
                        </div>
                        <div class="relative  order-first md:order-last aspect-[16/9] ">
                            <img class=" h-full object-cover w-full" src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}">
                            <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-white via-white-100/50  to-transparent"></div>
                            <div class="absolute hidden group-hover:block opacity-0 group-hover:opacity-100 transition-all ease-in duration-300 z-10  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <a href="{{ route('produkDetail', $product->slug) }}" class="bg-[#053D69] text-white font-bold py-2 px-4 rounded text-sm">Detail Produk</a>
                            </div>
                        </div>
                    @endif
                </div>
              @endforeach
        </div>
    </div>
  </div>