@extends('layouts.article')

@section('content')
    <div class="pt-2 pr-5 pl-5">
        <h1 class="mt-5 pt-3 mb-4 text-center">DASHBOARD</h1>
        <button type="button" class="btn btn-danger ml-5" data-toggle="modal" data-target="#staticBackdrop">Ganti Password</button>
        <form class="form-inline pr-5 mb-3 float-right" method="get" action="{{ url('/content-writer/cari') }}">
            @csrf
            <input class="form-control mr-sm-2" type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="form-control" placeholder="Cari ..">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </div>
    @if(Session::has('error')) 
    <div class="alert alert-success"> 
        {{ Session::get('error') }} 
    </div> 
    @endif 
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Ganti Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{ url('/content-writer/ganti-password') }}"> 
            @csrf 
                <div class="form-group">
                    <label for="PassLama">Password Lama</label>
                    <input type="text" class="form-control" id="PassLama" name="PassLama">
                </div>
                <div class="form-group">
                    <label for="PassBaru">Password Baru</label>
                    <input type="text" class="form-control" id="PassBaru" name="PassBaru">
                </div>
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ubah Password</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    <div class="px-5 mx-5 py-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="row">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Tag</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            @php 
            $no = 1; 
            @endphp
            @foreach($articles as $article)
            <tbody>
                <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{$article->judul}}</td>
                <td>
                    @foreach($article->tags as $tag)
                        <span>|</span>
                        <span>{{ $tag->tag }}</span>
                    @endforeach
                </td>
                <td>{{$article->created_at}}</td>
                <td>
                    <a href="{{ route('content-writer.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('content-writer.destroy', $article->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
                </tr>
            </tbody>
            @endforeach
            </table>
    </div>
@endsection
