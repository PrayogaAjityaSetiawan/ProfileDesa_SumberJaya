<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Artikel')]

class Blogview extends Component
{
    #[Url]
    public $categorySlug = null;

    public function render()
    {
        $categories = Category::all();
        $paginate = 10;
        if(!empty($this->categorySlug)){
            $catgory = Category::where('slug', $this->categorySlug)->first();
            if(empty($catgory)){
                abort(404);
            }
            $articles = Article::orderBy('created_at', 'DESC')
            ->where('category_id', $catgory->id)
            ->where('status', 1)
            ->paginate($paginate);
        }else{
            $articles = Article::orderBy('created_at', 'DESC')
            ->where('status', 1)
            ->paginate($paginate);
        }
    
        return view('livewire.blogview', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
}
