@extends('layouts.home')

@section('content')
<!-- navbar -->
<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 fixed-top text-light" style="background-color: black;">
    	  <div class="col-7">
    	  	<h1 class="d-flex justify-content-center justify-content-md-start pl-md-5" style="font-family: 'Red Rose', cursive; color: #f6c813;">CINEMATEC</h1>
    	  </div>
    	  	<nav>
			  	<a class="nav-item" href="{{ url('/') }}">HOME</a>
			    <a class="nav-item" href="{{ url('/about') }}">ABOUT</a>
                <a class="nav-item" href="{{ url('/contact') }}">CONTACT</a>
			    @auth
					<a class="nav-item bg-warning text-dark" href="{{ route('user') }}">Akun Saya</a>
				@endauth
				@guest
					<a class="nav-item bg-warning text-dark" href="{{ route('login') }}"  >LOGIN</a>
				@endguest
		    </nav>  
	</div>
@foreach($articles as $article)
<div class="row mx-auto px-4 py-5 my-5 mx-lg-5">
	<div class="col-lg-8 col-xl-9 pr-lg-5">
		<h1 class="mt-4"><b>{{ $article->judul }}</b></h1>
		<small class="text-muted">{{ $article->created_at->diffForHumans() }}</small><br>
		<small class="text-muted">Penulis : {{$writer[0]->name}}</small><br>
		<small class="text-muted">
			<span>Tags : </span>
			@foreach($article->tags as $tag)
				<span>|</span>
				<span>{{ $tag->tag }}</span>
			@endforeach
		</small>
		<br><br>
		@auth
			<form action="{{url('/simpan')}}" method="post">
			@csrf
				<input type="hidden" name="article_id" value="{{$article->id}}">
				<button type="submit" class="btn btn-success float-right">Simpan</button>
			</form>
		@endauth
		@guest
			<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">Simpan</button>

			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-body">
					Anda Harus Login / Register Terlebih Dahulu Untuk Dapat Menyimpan Artikel
				</div>
				<div class="modal-footer">
					<a href="{{url('/login')}}" type="button" class="btn btn-success">Login</a>
					<a href="{{url('/register')}}" type="button" class="btn btn-primary">Register</a>
				</div>
				</div>
			</div>
			</div>
		@endguest
		@if(Session::has('message')) 
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>{{ Session::get('message') }}</strong><a href="{{ route('user') }}"> Lihat Disini</a>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div> 
		@endif 
		<hr><br>
		<img src="{{ url('/banner/'.$article->banner) }}" class="img-fluid mb-5" style="width:100%;">
		<div class="text-justify" style="font-size: 15px;">
			{!! $article->artikel !!}
		</div>
		<div class="text-justify" style="font-size: 15px;">
			<hr>
			<p class="text-muted"><i>Source:</i></p>
			<p class="text-muted"><i>{{ $article->sumber }}</i></p><br>
		</div>
	</div>
	@endforeach
	<div class="col-lg-4 col-xl-3 px-4 shadow sticky-top" style="max-height: 550px; top:100px;">
		<livewire:article-sidebar></livewire:article-sidebar>                
	</div>
@endsection