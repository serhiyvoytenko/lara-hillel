<div class="col">
    <div class="card shadow-sm">
        <a href="{{route('products.show' , $product->id)}}">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                 src="{{!Storage::exists($product->thumbnail) ? $product->thumbnail : Storage::url($product->thumbnail)}}">

        </a>
        <div class="card-body">
            <b><p class="card-text">{{__($product->title)}}</p></b>
            <p>{{$product->short_description}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('products.show' , $product->id)}}" type="button"
                       class="btn btn-sm btn-outline-secondary">
                        View details
                    </a>
                    <a href="{{route('categories.show', $product->category_id)}}" type="button"
                       class="btn btn-sm btn-outline-secondary">
                        {{ $product->category()->first()->title }}
                    </a>
                </div>
                <small class="text-muted">{{$product->price}}$</small>
            </div>
        </div>
    </div>
</div>
