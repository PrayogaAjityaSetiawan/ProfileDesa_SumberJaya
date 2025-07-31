<?php

use App\Livewire\BlogDetail;
use App\Livewire\Blogview;
use App\Livewire\Homepage;
use App\Livewire\Infografis;
use App\Livewire\Produkview;
use App\Livewire\SejarahView;
use App\Livewire\StrukurDesa;
use App\Livewire\WisataView;
use App\Livewire\ProductDetail;
use App\Livewire\SaranaPrasarana;
use App\Livewire\GaleriPage;
use App\Livewire\KeuanganDesa;
use Illuminate\Support\Facades\Route;

Route::get('/',Homepage::class)->name('homepage');
Route::get('/artikel', Blogview::class)->name('artikel');
Route::get('/artikel/{slug}', BlogDetail::class)->name('blogDetail');
Route::get('/produk', Produkview::class)->name('produk');
Route::get('/produk/{slug}', ProductDetail::class)->name('produkDetail');
Route::get('/sejarah', SejarahView::class)->name('sejarah');
Route::get('/struktur-desa', StrukurDesa::class)->name('struktur-desa');
Route::get('/infografis', Infografis::class)->name('infografis');
Route::get('/keuangan', KeuanganDesa::class)->name('keuangan');
Route::get('/sarana-prasarana', SaranaPrasarana::class)->name('sarana-prasarana');
Route::get('/paket-wisata', WisataView::class)->name('paket-wisata');
Route::get('/galeri', GaleriPage::class)->name('galeri');
