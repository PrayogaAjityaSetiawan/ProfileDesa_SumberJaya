<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class BlogDetail extends Component

{
    public $slug = null;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $article = Article::select('articles.*', 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->where('articles.slug', $this->slug)
            ->firstOrFail();

        $latestArticles = Article::orderBy('created_at', 'DESC')
            ->where('id', '!=', $article->id)
            ->where('status', 1)
            ->limit(3)
            ->get();

        return view('livewire.blog-detail', [
            'article' => $article,
            'latestArticles' => $latestArticles
        ])->title($article->title . ' - Desa SumberJaya');
    }
}
