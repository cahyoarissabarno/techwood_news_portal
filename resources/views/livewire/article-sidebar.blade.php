<div>
    <h3 class="mt-4 main-title">Artikel Lainnya</h3>
    <br>
    <div class="col-xs">
        <button type="button" wire:click="getTag('')" class="btn btn-light lead2 shadow sidetag my-2 mx-1">All Article</button>
        @foreach($tags as $tag)
            <button wire:click="getTag({{ $tag->id }})" type="button" class="btn btn-light lead2 shadow sidetag my-2 mx-1">{{ $tag->tag }}</button>
        @endforeach
    </div>
    <input wire:model="search" class="form-control ml-3 shadow mt-4" type="search" placeholder="Search" aria-label="Search" style="width: 80%;">
    @foreach($articles as $article)
        <div class="card mb-3 mt-4" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-4">
                    <img src="{{ url('/banner/'.$article->banner) }}" class="card-img">
                </div>
                <div class="col-8">
                    <div class="card-body" style="height:100px;">
                        <small class="card-title">{{ $article->judul }}</small>
                    </div>
                    <div class="card-footer">
                        <small class="card-text text-muted" style="font-size: 11px;">
                            {{ $article->created_at->diffForHumans() }}
                        </small>
                        <a href="{{ url('/article/'.$article->slug) }}" class="text-warning my-2 ml-3" target="_blank">Baca</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>