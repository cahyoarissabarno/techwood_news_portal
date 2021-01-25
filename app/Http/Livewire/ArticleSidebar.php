<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Article;
use App\Tag;
use Livewire\WithPagination;

class ArticleSidebar extends Component
{
    use WithPagination;
    
    public $tags;
    public $search;
    public $tagged;
    public $tagName;
    
    public function render()
    {
        $this->tags = Tag::all();
        if ($this->tagged != "") {
            $tag = Tag::where('id',$this->tagged)->first();
            $this->tagName = $tag->tag;
            $articles = $tag->articles()->paginate(2);
            $this->gotoPage(1);
        }
        else if ($this->search === null) {
            $this->tagged = "";
            $articles = Article::paginate(2);
            $this->gotoPage(1);
        }
        else {
            $this->tagged = "";
            $this->tagName = "";
            $articles = Article::where('judul','like','%'.$this->search.'%')->paginate(2);
            $this->gotoPage(1);
        }
        return view('livewire.article-sidebar', ['articles' => $articles]);
    }

    public function getTag($id)
    {
        $this->tagged = $id;
        $this->search ="";
        $this->render();
    }
}
