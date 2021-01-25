<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tag;
use App\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $article = Article::where('id_writer',$user->id)->get();
        return view('article.index',['articles'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tag::all();
        return view('article.create',['tags'=>$tag]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'artikel'=>'required',
            'tag'=>'required',
            'sumber'=>'required',
            'banner' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'id_writer' => 'required'
        ]);

        $slug = Str::slug($request->judul, '-');

		$banner = $request->file('banner');
		$nama_file = time()."_".$slug;
		$direct = 'banner';
		$banner->move($direct,$nama_file);

        $artikel = Article::create([
            'judul'=> $request->judul,
            'banner'=> $nama_file,
            'artikel'=> $request->artikel,
            'sumber'=>$request->sumber,
            'slug'=>$slug,
            'id_writer'=>$request->id_writer
        ]);

        $artikel->tags()->attach($request->tag);

        return redirect('content-writer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $articles = Article::where('id',$id)->get();
        return view('article.edit',['articles'=>$articles, 'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'=>'required',
            'artikel'=>'required',
            'tag'=>'required',
            'sumber'=>'required',
        ]);

        $article = Article::findOrFail($id);
        $slug = Str::slug($request->judul, '-');

        if ($request->has('banner')) {
            $banner = $request->file('banner');
            $nama_file = time()."_".$slug;
            $direct = 'banner';

            File::delete('banner/'.$article->banner);
            
            $banner->move($direct,$nama_file);

            $artikel_new = [
                'judul'=> $request->judul,
                'banner'=> $nama_file,
                'artikel'=> $request->artikel,
                'sumber'=>$request->sumber,
                'slug'=>$slug,
            ];
    
        }
        else {
            $artikel_new = [
                'judul'=> $request->judul,
                'artikel'=> $request->artikel,
                'sumber'=>$request->sumber,
                'slug'=>$slug,
            ];
        }

        $article->tags()->sync($request->tag);
        $article->update($artikel_new);

        return redirect('content-writer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::findOrFail($id);

        $article->tags()->detach();
        $article->users()->detach();

        File::delete('banner/'.$article->banner);

        $article->delete();

        return redirect('content-writer');
    }

    public function ganti(Request $request)
    {
        $request->validate([
            'PassBaru'=>'required',
            'PassLama'=>'required',
            'id'=>'required'
        ]);

        $user = User::where('id',$request->id)->first();
        if(Hash::check($request->PassLama,$user->password)) {
            $user->password = bcrypt($request->PassBaru);
            $user->save();
        } else {
            return redirect('content-writer')->with("error","Password tidak sesuai");
        }
        Auth::logout();
        return redirect('/login');
    }

    public function cari(Request $request)
    {
        $user = Auth::user();
        $cari = $request->cari;
        $article= Article::where('id_writer',$user->id)
            ->where('judul','like',"%".$cari."%")
            ->orWhere('created_at','like',"%".$cari."%")
            ->paginate(6);

        $article->appends($request->only('cari'));
        return view('article.index',['articles'=>$article]);
    }
}
