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

    <!-- Styles -->
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    @livewireStyles
    <title>Techwood</title>
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

    <!-- content -->
    <main>
        @yield('content')
    </main>

	  <!-- Site footer -->
    <footer class="site-footer bg-dark pt-5 text-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 text-left">
            <h5>Media Informasi Mengenai Dunia Technologi Dalam Industri Pembuatan Film Dunia, Khususnya Hollywood.</h5><br>
            <p>Thanks to:<img class="responsive-img ml-2" src="{{ asset('assets/logohmti.png') }}" style="width:90px; height:60px;"></p>
          </div>
          <div class="col-md-5 mt-4 pl-5">
            <a href=""><img class="icon" src="{{ asset('assets/facebook.svg') }}"></a>
            <a href=""><img class="icon" src="{{ asset('assets/instagram.svg') }}"></a>
            <a href=""><img class="icon" src="{{ asset('assets/twitter.svg') }}"></a>
            <a href=""><img class="icon" src="{{ asset('assets/youtube.svg') }}"></a>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12 col-sm-6 col-xs-12">
          	<hr style="background-color:white;">
            <p><small>Copyright &copy; 2020 All Rights Reserved by <span class="text-warning">Techwood</span></small>
            </p>
          </div>
        </div>
      </div>
</footer>
@livewireScripts
  </body>
</html>