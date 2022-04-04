<div class="col">
    <div class="card shadow-sm">
        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{Storage::url($product->thumbnail)}}">
        <div class="card-body">
            <b><p class="card-text">{{$product->title}}</p></b>
            <p>{{$product->short_description}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('products.show' , $product->id)}}" type="button" class="btn btn-sm btn-outline-secondary">
                        View details
                    </a>
                    <a type="button" class="btn btn-sm btn-outline-secondary">
                        Buy
                    </a>
                </div>
                <small class="text-muted">{{$product->price}}$</small>
            </div>
        </div>
    </div>
</div>
