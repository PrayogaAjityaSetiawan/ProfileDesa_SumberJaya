<div class="grid grid-cols-1 items-stretch md:grid-cols-2 gap-2 bg-blue-100 overflow-hidden rounded-2xl group cursor-pointer">
                @if ($index % 2 == 0)             
                    <div class="relative ">
                        <div class="aspect-[16/9]">
                            <img class="h-full object-cover w-full" src="{{ asset('storage/' . $paketWisata->gambar_paket) }}" alt="{{ $paketWisata->nama_paket }}">
                        </div>
                        <div class="absolute  inset-0 bg-gradient-to-t md:bg-gradient-to-l from-blue-100 via-blue-100/50  to-transparent"></div>
                        <div class="absolute hidden group-hover:block opacity-0 group-hover:opacity-100 transition-all ease-in duration-300 z-10  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                            <button class="bg-[#053D69] text-white font-bold py-2 px-4 rounded text-sm">Booking Sekarang</button>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col justify-center gap-6">
                        <h1 class="text-lg md:text-2xl font-bold text-gray-800">{{ $paketWisata->nama_paket }}</h1>
                        <div class="text-sm md:text-base 2xl:text-lg mt-0 text-gray-600 leading-relaxed">
                            <p>{!! str($paketWisata->deskripsi)->sanitizeHtml() !!}</p>
                        </div>
                    </div>
                @else
                    <div class="p-6 flex flex-col justify-center gap-6">
                        <h1 class="text-lg md:text-2xl font-bold text-gray-800">{{ $paketWisata->nama_paket }}</h1>
                        <div class="text-sm md:text-base 2xl:text-lg mt-0 text-gray-600 leading-relaxed">
                            <p>{!! str($paketWisata->deskripsi)->sanitizeHtml() !!}</p>
                        </div>
                    </div>
                    <div class="relative  order-first md:order-last aspect-[16/9] ">
                        <img class=" h-full object-cover w-full" src="{{ asset('storage/' . $paketWisata->gambar_paket) }}" alt="{{ $paketWisata->nama_paket }}">
                        <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-blue-100 via-blue-100/50 to-transparent"></div>
                        <div class="absolute hidden group-hover:block opacity-0 group-hover:opacity-100 transition-all ease-in duration-300 z-10  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                            <button class="bg-[#053D69] text-white font-bold py-2 px-4 rounded text-sm">Booking Sekarang</button>
                        </div>
                    </div>
                @endif
            </div>