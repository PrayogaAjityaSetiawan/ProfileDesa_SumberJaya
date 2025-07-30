<div class="group ">
    <div class="bg-white  flex flex-col transition-all duration-300 overflow-hidden h-full">
        <div class="relative overflow-hidden">
            <img 
                class="w-full rounded-2xl h-80 sm:h-84 2xl:h-[400px] object-cover transition-transform duration-500 group-hover:scale-110" 
                src="{{ asset('storage/' . $perangkat->foto) }}" 
                alt="Foto {{ $perangkat->nama }}"
                loading="lazy"
            >
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