<div class="md:w-[80%] 2xl:w-[70%] px-4 mx-auto pt-30 selection:bg-[#05426F] selection:text-white">
    {{-- <div class="flex items-center space-x-2 text-sm mb-3">
        <a href="{{ route('homepage') }}" wire:navigate class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 cursor-pointer transition-colors">
            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
            </svg>
            Home
        </a>
        
        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
        </svg>
        
        <a href="{{ route('produk') }}" wire:navigate class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 hover:bg-gray-200 cursor-pointer transition-colors">
            Produk
        </a>
        
        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
        </svg>
        
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
            {{ $product->nama }}
        </span>
    </div> --}}
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
                <a href="{{ route('produk') }}" class="hover:text-blue-600 transition-colors duration-200">
                    Produk
                </a>
            </li>
            <li>
                <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </li>
            <li class="text-gray-800 font-medium truncate">
                {{ $product->nama }}
            </li>
        </ol>
    </nav>

    <div class="w-full flex flex-col md:flex-row  items-start gap-5">
        <div class="md:w-1/2 ">
            <img class=" rounded-2xl bg-center bg-cover" src="{{ asset('storage/' . $product->gambar) }}" alt="">
        </div>
        <div class="md:w-1/2 flex flex-col gap-3">
            <div class="flex flex-row items-center justify-between">
                <h1 class="text-2xl capitalize font-bold">{{ $product->nama }}</h1>
                <span class="text-lg font-semibold">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
            </div>
            <p class="text-justify">{{ $product->deskripsi }}</p>
            @if ($product->link_video)
                <span class="flex items-center gap-2 text-sm "> 
                    Vidio Wawancara Untuk Produk {{ $product->nama }}   
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M128 128C92.7 128 64 156.7 64 192L64 448C64 483.3 92.7 512 128 512L384 512C419.3 512 448 483.3 448 448L448 192C448 156.7 419.3 128 384 128L128 128zM496 400L569.5 458.8C573.7 462.2 578.9 464 584.3 464C597.4 464 608 453.4 608 440.3L608 199.7C608 186.6 597.4 176 584.3 176C578.9 176 573.7 177.8 569.5 181.2L496 240L496 400z"/></svg>
                </span>

                @php
                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $product->link_video, $matches);
                    $videoId = $matches[1] ?? null;
                @endphp

                @if ($videoId)
                    <div class="aspect-w-16 aspect-h-9 mt-4">
                        <iframe
                            class="w-full h-80"
                            src="https://www.youtube.com/embed/{{ $videoId }}"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    </div>
                @else
                    <p class="text-red-500">Link tidak valid</p>
                @endif
            @else
                <div class="flex items-center justify-center bg-white rounded-2xl border border-gray-200 text-center p-5">
                    <span class="text-lg font-semibold text-red-600">Produk Ini Tidak Ada Vidio</span>
                </div>
            @endif

             <!-- #region -->
            <div>
                    {{-- Tombol WhatsApp --}}
                    @if ($product->no_wa)
                        <a href="{{ $product->no_wa }}" target="_blank"
                            class="flex items-center justify-center gap-2 bg-green-500 text-white px-4 py-2 rounded-xl">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M476.9 161.1C435 119.1 379.2 96 319.9 96C197.5 96 97.9 195.6 97.9 318C97.9 357.1 108.1 395.3 127.5 429L96 544L213.7 513.1C246.1 530.8 282.6 540.1 319.8 540.1L319.9 540.1C442.2 540.1 544 440.5 544 318.1C544 258.8 518.8 203.1 476.9 161.1zM319.9 502.7C286.7 502.7 254.2 493.8 225.9 477L219.2 473L149.4 491.3L168 423.2L163.6 416.2C145.1 386.8 135.4 352.9 135.4 318C135.4 216.3 218.2 133.5 320 133.5C369.3 133.5 415.6 152.7 450.4 187.6C485.2 222.5 506.6 268.8 506.5 318.1C506.5 419.9 421.6 502.7 319.9 502.7zM421.1 364.5C415.6 361.7 388.3 348.3 383.2 346.5C378.1 344.6 374.4 343.7 370.7 349.3C367 354.9 356.4 367.3 353.1 371.1C349.9 374.8 346.6 375.3 341.1 372.5C308.5 356.2 287.1 343.4 265.6 306.5C259.9 296.7 271.3 297.4 281.9 276.2C283.7 272.5 282.8 269.3 281.4 266.5C280 263.7 268.9 236.4 264.3 225.3C259.8 214.5 255.2 216 251.8 215.8C248.6 215.6 244.9 215.6 241.2 215.6C237.5 215.6 231.5 217 226.4 222.5C221.3 228.1 207 241.5 207 268.8C207 296.1 226.9 322.5 229.6 326.2C232.4 329.9 268.7 385.9 324.4 410C359.6 425.2 373.4 426.5 391 423.9C401.7 422.3 423.8 410.5 428.4 397.5C433 384.5 433 373.4 431.6 371.1C430.3 368.6 426.6 367.2 421.1 364.5z"/></svg>
                            Hubungi via WhatsApp
                        </a>
                    @endif
            </div>
        </div>
    </div>
</div>
