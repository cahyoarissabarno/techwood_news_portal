<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('assets/logo.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@700&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    @livewireStyles
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
    <div class="d-flex justify-content-center fixed-top bg-light w-100 h-100 pt-5" id="loader" style="z-index:999;">
      <div style="margin-top:150px; margin-bottom:150px; padding-top:250px;" class="la-ball-clip-rotate-multiple la-3x">
          <div class="text-dark"></div>
          <div class="text-warning"></div>
      </div>
    </div>
  	<a href="#" id="myBtn" title="Go to top">
  		<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-up-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
        <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 5.707 5.354 8.354a.5.5 0 1 1-.708-.708l3-3z"/>
      </svg>
  	</a>

    <!-- content -->
    
    <main>
        @yield('content')
    </main>

	  <!-- Site footer -->
    <footer class="site-footer bg-dark text-light pt-3">
      <div class="container">
        <div class="row py-4">
          <div class="col-md-5 text-left">
            <img src="{{ asset('assets/logo.png') }}" class="float-left mr-3 img-fluid" width="85" height="85">
            <p class="mt-3">Media Informasi Mengenai Dunia Teknologi Dalam Industri Pembuatan Film</p>
          </div>
          <div class="col-md-7 pl-md-5">
            <div class="float-md-right mt-3 mr-4">
              <a href=""><img class="icon mr-3 mr-md-0" src="{{ asset('assets/facebook.svg') }}"></a>
              <a href=""><img class="icon mr-3 mr-md-0" src="{{ asset('assets/instagram.svg') }}"></a>
              <a href=""><img class="icon mr-3 mr-md-0" src="{{ asset('assets/twitter.svg') }}"></a>
              <a href=""><img class="icon mr-3 mr-md-0" src="{{ asset('assets/youtube.svg') }}"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12 col-sm-6 col-xs-12">
          	<hr style="background-color:white;">
            <p><small>Copyright &copy; 2020 All Rights Reserved by <span class="text-warning">Cinematec</span></small>
            </p>
          </div>
        </div>
      </div>
</footer>
@livewireScripts
  </body>
  <script>
    window.addEventListener('load', function () {
      document.getElementById('loader').classList.remove('d-flex');
      document.getElementById('loader').classList.add('d-none');
    })

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