@extends('layouts.admin')

@section('content')
    <style>
        .modal{
            display:block;
            background-color:rgba(0, 0, 0, 0.5);
        }
    </style>
    <div class="pt-2 pr-5 pl-5">
        <h1 class="mt-5 pt-3 mb-5 text-center">DASHBOARD</h1>
        <button type="button" class="btn btn-primary shadow ml-5" data-toggle="modal" data-target="#staticBackdrop"> Tambah Akun </button>
        <form class="form-inline pr-5 mb-3 float-right" method="get" action="{{ url('/tag/cari') }}">
            @csrf
            <input class="form-control mr-sm-2" type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="form-control" placeholder="Cari ..">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </div>
    

    <!-- Modal -->
    <div class="modal fade show" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Registrasi</h5>
            <form action="{{ route('admin.index') }}">
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </form>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('admin.update', $id) }}"> 
            @csrf 
            <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$email}}">
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    <div class="px-5 mx-5 py-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php 
                $no = 1; 
            @endphp
            @foreach($users as $user)
                <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
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
