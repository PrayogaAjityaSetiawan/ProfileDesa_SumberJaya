<?php

namespace App\Livewire;

use App\Models\About;
use App\Models\Galeri;
use App\Models\Article;
use App\Models\Product;
use App\Models\Section;
use Livewire\Component;
use App\Models\PaketWisata;
use App\Models\PerangkatDesa;
use Livewire\Attributes\Title;


#[Title('Selamat Datang di Desa Wisata')]

class Homepage extends Component
{
    public function render()
    {
        $paketWisatas = PaketWisata::limit(4)->get();
        $products = Product::limit(3)->get();
        $perangkatDesas = PerangkatDesa::limit(4)->get();
        $articles = Article::orderBy('created_at', 'DESC')->where('status', 1)
            ->limit(3)
            ->get();
        $about = About::first();
        $section = Section::first();
        $galeris = Galeri::orderBy('created_at', 'DESC')
            ->limit(6)->get();
        return view('livewire.homepage')
            ->with('about', $about,)
            ->with('section', $section)
            ->with('articles', $articles)
            ->with('perangkatDesas', $perangkatDesas)
            ->with('products', $products)
            ->with('paketWisatas', $paketWisatas)
            ->with('galeris', $galeris);
    }
}
