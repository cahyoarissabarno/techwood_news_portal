<div>
    <h3 class="mt-4 main-title">Artikel Lainnya</h3>
    <div class="col-xs mt-4">
        <button type="button" wire:click="getTag('')" class="btn btn-light lead2 shadow sidetag my-2 mx-1">All Article</button>
        <div class="btn-group">
            <button type="button" class="btn btn-light lead2 shadow sidetag my-2 mx-1 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if($tagName)
                    - {{$tagName}} -
                @else
                    - Search by Tags -
                @endif
            </button>
            <div class="dropdown-menu">
            @foreach($tags as $tag)
                <a wire:click="getTag({{ $tag->id }})" class="lead2 sidetag dropdown-item">{{ $tag->tag }}</a>
            @endforeach
            </div>
        </div>
        <!-- @foreach($tags as $tag)
            <button wire:click="getTag({{ $tag->id }})" type="button" class="btn btn-light lead2 shadow sidetag my-2 mx-1">{{ $tag->tag }}</button>
        @endforeach -->
    </div>
    <input wire:model="search" wire:click="getTag('')" class="form-control ml-3 shadow mt-4 mb-3" type="search" placeholder="Search" aria-label="Search" style="width: 80%;">
    <div class="d-flex justify-content-center">
        <div wire:loading>
            <div class="la-ball-clip-rotate-multiple la-3x mt-5 pt-5">
                <div class="text-dark"></div>
                <div class="text-warning"></div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-lg-column flex-sm-row flex-column">
        @foreach($articles as $article)
            <div class="card mt-4 shadow" style="max-width: 400px; border-radius:15px;" wire:loading.class="d-none">
                <div class="row no-gutters px-3 py-2">
                    <div class="col-9">
                        <small class="card-title">{{ $article->judul }}</small>
                    </div>
                    <div class="col-3">
                        <a href="{{ url('/article/'.$article->slug) }}" class="btn btn-warning my-2 float-right" target="_blank">Baca</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div wire:loading.class="d-none">
        <div class="mt-5 d-flex justify-content-center">{{ $articles->links('pagination-links') }}</div>
    </div>
</div>