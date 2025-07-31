<div class="selection:bg-[#05426F] selection:text-white">
    {{-- Hero Section --}} 
    <x-sections.hero :section="$section" />
    {{-- About Section --}}
    <x-sections.about :about="$about" />
    {{--Perangkat Desa  --}}
    <x-sections.perangkat-desa :perangkatDesas="$perangkatDesas" />
    {{-- Produk Desa --}}
    <x-sections.product :products="$products" />
    {{-- Paket Wisata --}}
    <x-sections.paket-wisata :paketWisatas="$paketWisatas" />
    {{-- Galeri --}}
    <x-sections.galeri :galeris="$galeris" />
    {{-- Artikel --}}
    <x-sections.article :articles="$articles" />
</div>