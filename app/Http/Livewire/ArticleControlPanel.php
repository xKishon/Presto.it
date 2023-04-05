<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleControlPanel extends Component
{
    public $article;

    public function destroy(Article $article){
        $article->delete();
    }

    public function render()
    {
        return view('livewire.article-control-panel');
    }
}
