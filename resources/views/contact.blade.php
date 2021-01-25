@extends('layouts.home')

@section('content')
<!-- navbar -->
<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 fixed-top text-light" style="background-color: black; z-index:998;">
    <div class="col-8">
    <h1 class="name" style="font-family: 'Red Rose', cursive; color: #f6c813;">CINEMATEC</h1>
    </div>
    <nav>
        <a class="nav-item" href="{{ url('/') }}">HOME</a>
        <a class="nav-item" href="{{ url('/about') }}">ABOUT</a>
        @auth
			<a class="nav-item bg-warning text-dark" href="{{ route('user') }}">Akun Saya</a>
		@endauth
		@guest
			<a class="nav-item bg-warning text-dark" href="{{ route('login') }}"  >LOGIN</a>
		@endguest
    </nav>  
</div>
<div class="row mx-auto px-4 py-5 my-5 mx-lg-5">
    <div class="col">
        <h1 class="mt-4 text-center main-title"><b>KONTAK KAMI</b></h1><br>
        <div class="text-justify" style="font-size: 20px;">
            <p>
                Hubungi kami jika anda ingin menjadi kontributor, memberi kritik & saran, atau mengenai kerja sama bisnis. Silahkan hubungi kontak yang tertera di bawah ini.
            </p><br>
            <h5><b>Email:</b></h5>
            <p>c4herz@gmail.com</p>
        </div>
    </div>
</div>
@endsection
