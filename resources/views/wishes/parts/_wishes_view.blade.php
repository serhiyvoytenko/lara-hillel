<div class="col">
    <div class="card shadow-sm">
        <a href="{{route('products.show' , $wishes->id)}}">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                 src="{{!Storage::exists($wishes->thumbnail) ? $wishes->thumbnail : Storage::url($wishes->thumbnail)}}">

        </a>
        <div class="card-body">
            <b><p class="card-text">{{$wishes->title}}</p></b>
            <p>{{$wishes->short_description}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('products.show' , $wishes->id)}}" type="button"
                       class="btn btn-sm btn-outline-secondary">
                        View details
                    </a>
                </div>
                <small class="text-muted">{{$wishes->price}}$</small>
            </div>
        </div>
    </div>
</div>
