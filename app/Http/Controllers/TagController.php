<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::all();
        return view('admin.tag',['tag'=>$tag]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'tag'=>'required'
        ]);

        $tag = $request->tag;
        Tag::insert([
            'tag'=>$tag
        ]);

        return redirect('tag');
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
        $tag=Tag::all();
        $tags=Tag::findOrFail($id);
        return view('admin.tag_edit',['tag'=>$tag, 'tags'=>$tags]);
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
            'tag'=>'required'
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update($request->all());

        return redirect('tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::findOrFail($id);
        $tag->articles()->detach();
        $tag->delete();

        return redirect('tag');
    }
    
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $tag=Tag::orderBy('id','desc')
            ->where('tag','like',"%".$cari."%")
            ->paginate(6);

        $tag->appends($request->only('cari'));
        return view('admin.tag',['tag'=>$tag]);
    }
}
