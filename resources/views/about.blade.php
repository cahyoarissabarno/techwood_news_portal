@extends('layouts.home')

@section('content')
<!-- navbar -->
<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 fixed-top text-light" style="background-color: black; z-index:998;">
    <div class="col-8">
        <h1 class="name" style="font-family: 'Red Rose', cursive; color: #f6c813;">CINEMATEC</h1>
    </div>
    <nav>
        <a class="nav-item" href="{{ url('/') }}">HOME</a>
        <a class="nav-item" href="{{ url('/contact') }}">CONTACT</a>
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
			<h1 class="mt-4 text-center main-title"><b>TENTANG KAMI</b></h1><br>
			<div class="text-justify" style="font-size: 20px;">
				<p><span class="text-warning"><b>Cinematec</b></span> adalah media informasi digital mengenai penggunaan dan perkembangan dunia teknologi yang berperan dalam memajukan industri pembuatan film dunia, khususnya pada perfilman Hollywood yang <u class="main-title">dirangkum dari berbagai sumber</u>.</p><br>
				<h3>SOURCE :</h3>
				<hr>
				<ul>
					<li>
						<h5>BANNER HOME</h5>
						<ul>
							<li>
								<small>https://www.universalstudioshollywood.com/tridiondata/ush/en/us/files/images/universal-studio-tour-art-V2-2800x1197-a.jpg?imwidth=580</small>
							</li>	
						</ul>
					</li>
					<br>
					<li>
						<h5>ARTICLE :</h5>
						<ul>
						@foreach($articles as $article)
							<li><small>{{$article->sumber}}</small></li>
						@endforeach
						</ul>
					</li>
				</ul>
			 	</div>
		    </div>
		</div>
	</div>
@endsection