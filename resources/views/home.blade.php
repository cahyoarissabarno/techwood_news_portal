@extends('layouts.home')

@section('content')
<!-- navbar -->
<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 fixed-top text-light" style="background-color: black;">
	<div class="col-7">
		<h1 class="name" style="font-family: 'Red Rose', cursive; color: #f6c813;">TECHWOOD</h1>
	</div>
	<nav>
		<a class="nav-item" href="#article">ARTICLE</a>
		<a class="nav-item" href="{{ url('/about') }}">ABOUT</a>
		<a class="nav-item" href="{{ url('/contact') }}">CONTACT</a>
		@auth
			<a class="nav-item bg-warning text-dark" href="{{ route('user') }}">Akun Saya</a>
		@endauth
		@guest
			<a class="nav-item bg-warning text-dark" href="{{ route('login') }}"  >LOGIN</a>
		@endguest
		</form>
	</nav>  
</div>
<div class="text-right top">
	<p class="title mr-4">TECHNOLOGIES<br>IN THE<br>HOLLYWOOD</p>
	<a class="btn btn-warning btn-lg mr-5" href="#article" style="color: black;">FIND OUT!</a>
</div>
<div id="article" class="tag-hp"></div><br>
<livewire:article-index></livewire:article-index>
@endsection
