<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Article;
use App\Tag;

class ArticleSidebar extends Component
{
    public $articles;
    public $tags;
    public $search;
    public $tagged;
    
    public function render()
    {
        $this->tags = Tag::all();
        if ($this->tagged != "") {
            $tag = Tag::where('id',$this->tagged)->first();
            $this->articles = $tag->articles;
        }
        else if ($this->search === null) {
            $this->articles = Article::latest()->get();
        }
        else {
            $this->tagged="";
            $this->articles = Article::where('judul','like','%'.$this->search.'%')->get();
        }
        return view('livewire.article-sidebar');
    }

    public function getTag($id)
    {
        $this->tagged = $id;
        $this->search ="";
        $this->render();
    }
}
