<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Article;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserPage extends Component
{
    public $articles;
    public $tags;
    public $search;
    public $tagged;

    public function render()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->first();

        $this->tags = Tag::all();
        if ($this->tagged != "") {
            $this->articles = $user->articles()->where('id',$this->tagged)->get();
        }
        else if ($this->search === null) {
            $this->articles = $user->articles()->latest()->get();
        }
        else {
            $this->articles = $user->articles()->where('judul','like','%'.$this->search.'%')->get();
        }
        return view('livewire.user-page');
    }

    public function getTag($id)
    {
        $this->tagged = $id;
        $this->render();
    }
}
