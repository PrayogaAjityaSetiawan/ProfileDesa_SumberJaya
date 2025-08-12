<div class="group ">
    <div class="bg-white  flex flex-col transition-all duration-300 overflow-hidden h-full">
        <div class="relative overflow-hidden">
            @if (isset($perangkat->foto) && $perangkat->foto !== null)      
                <img 
                    class="w-full rounded-2xl h-80 sm:h-84 2xl:h-[400px] object-cover transition-transform duration-500 group-hover:scale-110" 
                    src="{{ asset('storage/' . $perangkat->foto) }}" 
                    alt="Foto {{ $perangkat->nama }}"
                    loading="lazy"
                >
            @else
                <div class="w-full h-80 sm:h-84 2xl:h-[400px] bg-gray-200 rounded-2xl flex items-center justify-center">
                    <svg class="w-30 h-30 text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <div class="absolute bottom-0 left-0 right-0 p-4 backdrop-blur-xl  text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">
                <div class="text-sm font-medium">{{ $perangkat->jabatan }}</div>
            </div>
        </div>
        
        <div class="p-4 md:p-6 flex-grow flex flex-col justify-center">
            <div class="text-center space-y-3">
                <h2 class="text-base md:text-lg font-semibold text-gray-800 leading-tight">
                    {{ $perangkat->nama }}
                </h2>
            </div>
        </div>
    </div>
</div>