<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function article($slug)
    {
        $article = Article::where('slug',$slug)->get();
        $writer = User::where('id',$article[0]->id_writer)->get();
        return view('article',['articles'=>$article, 'writer'=>$writer]);
    }

    public function about()
    {
        $article = Article::all();
        return view('about',['articles'=>$article]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'article_id' => 'required'
        ]);

        $user_id = Auth::user()->id;
        $article = Article::where('id',$request->article_id)->first();

        foreach ($article->users as $user) {
            if ($user->id == $user_id) {
                return redirect()->back()->with('message','Artikel Ini Pernah Anda Simpan Sebelumnya.');
            }
        }

        $article->users()->attach([$user_id]);

        return redirect()->back()->with('message','Artikel Ini Berhasil Disimpan.');
    }

    public function userPage()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->first();
        $article = $user->articles;

        return view('userpage',['articles'=>$article]);
    }

    public function userPageDel(Request $request)
    {
        $request->validate([
            'article_id' => 'required'
        ]);

        $user_id = Auth::user()->id;
        $article = Article::where('id',$request->article_id)->first();

        $article->users()->detach([$user_id]);

        return redirect()->back();
        // ->with('message','Artikel Ini Berhasil Disimpan');
    }
}
