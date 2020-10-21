@extends('layouts.article')

@section('content')
<div class="row mx-auto px-4 py-5 my-5 mx-lg-5">
	@foreach($articles as $article)
		<div class="col">
			<form class="bg-white px-5 py-5 mt-5 mx-md-5 shadow" method="post" action="{{ route('content-writer.update',$article->id) }}" enctype='multipart/form-data'> 
            @csrf 
                <input type="hidden" name="_method" value="PATCH">
				<h1>POST</h1><br>
				<div class="form-group">
				    <label for="title">Judul</label>
				    <input type="text" class="form-control" id="title" name="judul" value="{{$article->judul}}">
			    </div>
				<div class="form-group">
					<label for="banner">Banner</label>
					<input type="file" class="form-control-file" id="banner" name="banner">
				</div>
			    <div class="form-group">
				    <label for="artikel">Artikel</label>
				    <textarea  id="artikel" name="artikel">{{$article->artikel}}</textarea>
			    </div>
			    <p>Tag</p>
			    <div class="form-row ml-3 mb-4">
				@foreach($tags as $tag)
				    <div class="col">						
				      	<input type="checkbox" class="form-check-input" id="{{ $tag->tag }}" value="{{ $tag->id }}" name="tag[]"
                        @foreach($article->tags as $taged)
                            @if($tag->id == $taged->id)
                                checked
                            @endif
                        @endforeach
                        >
						<label class="form-check-label ml-4" for="{{ $tag->tag }}">{{ $tag->tag }}</label>
				    </div>
				@endforeach
				  </div>
				  <div class="form-group">
				    <label for="sumber">Sumber</label>
				    <input type="text" class="form-control" id="sumber" name="sumber" value="{{$article->sumber}}">
			    </div>
			    <button type="submit" class="btn btn-primary mt-5">Submit</button>
			</form>
		</div>
		@endforeach
	</div>
@endsection
