<div>
<div class="container text-center mx-auto tag">
	<div class="row px-2 py-2 mx-auto">
		<div class="col-xs"><button type="button"  wire:click="getTag('')" class="btn btn-light shadow lead my-2 mx-1">All Article</button></div>
        @foreach($tags as $tag)
            <div class="col-xs"><button
                wire:click="getTag({{ $tag->id }})"
            type="button" class="btn btn-light shadow lead my-2 mx-1">{{$tag->tag}}</button></div>
        @endforeach
	</div>
	<input wire:model="search" name="search" class="form-control mr-sm-2 shadow mt-4" type="text" placeholder="Search" aria-label="Search" style="width: 50%;">
</div>
<br>
<div class="container text-left artikel">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
        @foreach($articles as $article)
        <div class="col">
            <div class="card my-2 shadow" style="max-width: 540px;">
                <div class="row no-gutters">
                <div class="col-4 col-sm-12">
                    <img src="{{ url('/banner/'.$article->banner) }}" class="card-img">
                </div>
                <div class="col-md-12 col-8">
                    <div class="card-body" style="min-height:110px;">
                        <h6 class="card-title">{{ $article->judul }}</h6>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted font-italic">{{ $article->created_at->diffForHumans() }}</small>
                        <a href="{{ url('/article/'.$article->slug) }}" class="btn btn-warning shadow lead my-2 ml-4" target="_blank">Baca</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>    
</div>