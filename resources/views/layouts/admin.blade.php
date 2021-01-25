<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{ asset('assets/icon.jpeg') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@700&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>

    <!-- Styles -->
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

    <title>Cinematec</title>
    <script>
		$(document).ready(function(){
		  $("a").on('click', function(event) {
		    if (this.hash !== "") {
		      event.preventDefault();
		      var hash = this.hash;
		      $('html, body').animate({
		        scrollTop: $(hash).offset().top
		      }, 800, function(){
		        window.location.hash = hash;
		      });
		    } // End if
		  });
		});
	</script>
  </head>
  <body>
  	<a href="#" id="myBtn" title="Go to top">
  		<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-up-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
	  <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 5.707 5.354 8.354a.5.5 0 1 1-.708-.708l3-3z"/>
	</svg>
  	</a>
  	<!-- bootstrap stuff -->
	    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	<!-- navbar -->
	<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 fixed-top text-light" style="background-color: black; z-index:998;">
    	  <div class="col-7">
    	  	<h1 class="name" style="font-family: 'Red Rose', cursive; color: #f6c813;">CINEMATEC ADMIN</h1>
    	  </div>
    	  	<nav>
			    <a class="nav-item" href="{{ url('/admin') }}">Dashboard</a>
			    <a class="nav-item" href="{{ url('/tag') }}">Tags</a>
          <a class="nav-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          <a id="navbarDropdown" class="nav-item bg-warning text-dark">
            <span>Hi! </span>{{ Auth::user()->name }} <span class="caret"></span>
          </a>
		    </nav>  
	</div>
	
	<!-- content -->
    <main class="py-4 d-lg-block d-none" style="min-height:600px;">
        @yield('content')
    </main>

	<div class="jumbotron d-lg-none d-block mx-4" style="margin-top:200px;">
		<h1 class="display-4">Perhatian !</h1>
		<hr class="my-4">
		<p>Halaman Admin hanya bisa dibuka melalui desktop</p>
	</div>

	  <!-- Site footer -->
    <footer class="site-footer bg-dark text-light d-lg-block d-none">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-12 col-sm-6 col-xs-12">
          	<hr style="background-color:white;">
            <p><small>Copyright &copy; 2020 All Rights Reserved by <span class="text-warning">Cinematec</span></small>
            </p>
          </div>
        </div>
      </div>
</footer>
<script id="dsq-count-scr" src="//techwood.disqus.com/count.js" async></script>
</body>
  <script>
  	var mybutton = document.getElementById("myBtn");
  	var footer = document.getElementById("footer");
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		    mybutton.style.display = "block";
		    footer.style.display = "block";
		  } else {
		    mybutton.style.display = "none";
		    footer.style.display = "none";
		  }
		}

  </script>
</html>