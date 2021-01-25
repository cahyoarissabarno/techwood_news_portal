<div>
<div class="container text-center mx-auto tag">
	<div class="row px-2 py-2 mx-auto">
        <div class="col col-md-4 mt-2">
            <input wire:model="search" wire:click="getTag('')" name="search" class="form-control mr-sm-2 shadow w-100" type="text" placeholder="Search" aria-label="Search" style="width: 50%;">
        </div>
        <div class="w-100 d-block d-md-none"></div>
        <div class="col col-md-8">
            <div class="float-left">
                <button type="button"  wire:click="getTag('')" class="btn btn-light shadow lead my-2 mx-1">All Article</button>
                <button type="button" class="btn btn-light lead shadow my-2 mx-1 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if($tagName)
                        - {{$tagName}} -
                    @else
                        - Search by Tags -
                    @endif
                </button>
                <div class="dropdown-menu">
                @foreach($tags as $tag)
                    <a wire:click="getTag({{ $tag->id }})" class="lead dropdown-item">{{ $tag->tag }}</a>
                @endforeach
                </div>
            </div>
        </div>
	</div>
</div>
<br>
<div class="container text-left artikel">
    <div class="d-flex justify-content-center">
        <div wire:loading>
            <div style="margin-top:150px; margin-bottom:150px" class="la-ball-clip-rotate-multiple la-3x">
                <div class="text-dark"></div>
                <div class="text-warning"></div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4" wire:loading.class="d-none">
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
    </div><br>
    <div class="float-right" wire:loading.class="d-none">{{ $articles->links('pagination-links') }}</div>
</div>    
</div>