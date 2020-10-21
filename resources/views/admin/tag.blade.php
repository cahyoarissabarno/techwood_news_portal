@extends('layouts.admin')

@section('content')
    <div class="pt-2 pr-5">
        <h1 class="my-5 py-3 text-center">DASHBOARD</h1>
        <form class="form-inline pr-5 mb-3 float-right" method="get" action="{{ url('/tag/cari') }}">
            @csrf
            <input class="form-control mr-sm-2" type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="form-control" placeholder="Cari ..">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
        <form class="form-inline pl-5 ml-5 mb-3 float-left" method="post" action="{{ route('tag.store') }}"> 
            @csrf 
            <input class="form-control mr-sm-2" type="text" name="tag" placeholder="Tambah Tag ....">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tambah Tag</button>
        </form>
    </div>
    <div class="px-5 mx-5 py-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tag</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php 
                $no = 1; 
            @endphp
            @foreach($tag as $t)
                <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{$t->tag}}</td>
                <td>
                    <a href="{{ route('tag.edit', $t->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('tag.destroy', $t->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
