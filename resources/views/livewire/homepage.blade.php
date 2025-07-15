<div>
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
    {{-- Artikel --}}
    <x-sections.article :articles="$articles" />
</div>