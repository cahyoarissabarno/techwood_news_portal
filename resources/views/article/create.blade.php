@extends('layouts.article')

@section('content')
<div class="row mx-auto px-4 py-5 my-5 mx-lg-5">
		<div class="col">
			<form class="bg-white px-5 py-5 mt-5 mx-md-5 shadow" method="post" action="{{ route('content-writer.store') }}" enctype='multipart/form-data'> 
            @csrf 
				<h1>POST</h1><br>
				<div class="form-group">
				    <label for="title">Judul</label>
				    <input type="text" class="form-control" id="title" name="judul">
			    </div>
				<div class="form-group">
					<label for="banner">Banner</label>
					<input type="file" class="form-control-file" id="banner" name="banner">
				</div>
			    <div class="form-group">
				    <label for="artikel">Artikel</label>
				    <textarea  id="artikel" name="artikel"></textarea>
			    </div>
			    <p>Tag</p>
			    <div class="form-row ml-3 mb-4">
				@foreach($tags as $tag)
				    <div class="col">						
				      	<input type="checkbox" class="form-check-input" id="{{ $tag->tag }}" value="{{ $tag->id }}" name="tag[]">
						<label class="form-check-label ml-4" for="{{ $tag->tag }}">{{ $tag->tag }}</label>
				    </div>
				@endforeach
				  </div>
				  <div class="form-group">
				    <label for="sumber">Sumber</label>
				    <input type="text" class="form-control" id="sumber" name="sumber">
			    </div>
				<input type="hidden" class="form-control"  name="id_writer" value="{{ Auth::user()->id }}">
			    <button type="submit" class="btn btn-primary mt-5">Submit</button>
			</form>
		</div>
	</div>
@endsection
