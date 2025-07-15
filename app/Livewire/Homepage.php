<?php

namespace App\Livewire;

use App\Models\About;
use App\Models\Article;
use App\Models\Section;
use App\Models\PerangkatDesa;
use App\Models\Product;
use App\Models\PaketWisata;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Selamat Datang di Desa Wisata')]

class Homepage extends Component
{
    public function render()
    {
        $paketWisatas = PaketWisata::limit(4)->get();
        $products = Product::limit(4)->get();
        $perangkatDesas = PerangkatDesa::limit(4)->get();
        $articles = Article::orderBy('created_at', 'DESC')->where('status', 1)
            ->limit(3)
            ->get();
        $about = About::first();
        $section = Section::first();
        return view('livewire.homepage')
            ->with('about', $about,)
            ->with('section', $section)
            ->with('articles', $articles)
            ->with('perangkatDesas', $perangkatDesas)
            ->with('products', $products)
            ->with('paketWisatas', $paketWisatas);
    }
}
