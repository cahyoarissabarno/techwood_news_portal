@extends('layouts.home')

@section('content')
<!-- navbar -->
<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 fixed-top text-light" style="background-color: black; z-index:998;">
	<div class="col-7">
		<h1 class="name" style="font-family: 'Red Rose', cursive; color: #f6c813;">CINEMATEC</h1>
	</div>
	<nav>
		<a class="nav-item" href="/">HOME</a>
		<a class="nav-item" href="{{ url('/about') }}">ABOUT</a>
		<a class="nav-item" href="{{ url('/contact') }}" >CONTACT</a>
		<a class="nav-item bg-warning text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			{{ __('Logout') }}
		</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
	</nav>  
</div>
<div class="mt-3 pt-3 text-center">
	<h1 class="mt-5 pt-5">Selamat Datang! {{Auth::user()->name}}</h1>
</div>
<hr class="ml-5 pl-5">
<h4 class="text-center">Artikel Yang Disimpan : </h4>
<br>
<div class="container text-left artikel mt-1 pt-1">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
        @foreach($articles as $article)
        <div class="col">
            <div class="card my-2 shadow" style="max-width: 540px;">
                <div class="row no-gutters">
                <div class="col-4 col-sm-12">
                    <img src="{{ url('/banner/'.$article->banner) }}" class="card-img">
                </div>
                <div class="col-md-12 col-8">
                    <div class="card-body">
                        <h6 class="card-title">{{ $article->judul }}</h6>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted font-italic">{{ $article->created_at->diffForHumans() }}</small>
                        <a href="{{ url('/article/'.$article->slug) }}" class="btn btn-warning shadow lead my-2 ml-4"  >Baca</a>
                    </div>
					<form action="{{url('/Userpage/delete')}}" method="post">
					@csrf
						<input type="hidden" name="article_id" value="{{$article->id}}">
						<button type="submit" class="btn btn-danger" style="width:100%;" onclick="return confirm('Yakin Ingin Menghapus Article ini ?')">Hapus</button>
					</form>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>    
</div>
@endsection
