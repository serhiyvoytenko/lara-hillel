@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __($product->title) }}</h3>
            </div>
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <img
                    src="{{!Storage::exists($product->thumbnail) ? $product->thumbnail : Storage::url($product->thumbnail)}}"
                    class="card-img-top"
                    style="width: 200px; height: 300px; margin: 0 auto; display: block;">
            </div>
            <div class="col-md-6">
                <p>Price: {{ $product->price }}$</p>
                <p>SKU: {{ $product->sku }}</p>
                <p>Count: {{ $product->count }}</p>
                <hr>
                <div>
                    <p>Product Category:
                        <b> @include('categories.parts.category_view', ['category' => $product->category])</b></p>
                </div>
                @auth
                    @if($product->count > 0)
                        <hr>
                        <div>
                            <p>Add to Cart: </p>
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="form-inline">
                                @csrf
                                @method('post')
                                <div class="form-group col-sm-3 mb-2">
                                    <label for="product_count" class="sr-only">Count: </label>
                                    <input type="number"
                                           name="product_count"
                                           class="form-control"
                                           id="product_count"
                                           min="1"
                                           max="{{ $product->count }}"
                                           value="1"
                                    >
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mb-2">Buy</button>
                            </form>
                            <form class="form-horizontal poststars" action="{{ route('account.setRating', $product) }}" id="addStar"
                                  method="POST">
                                @csrf
                                <div class="form-group required">
                                    <div class="col-sm-5 stars">
                                        @if(!is_null($product->getUserRating()))
                                            @for($i = 5; $i >= 1; $i--)
                                                <input class="star star-{{$i}}"
                                                       value="{{$i}}"
                                                       id="star-{{$i}}"
                                                       type="radio"
                                                       name="star"
                                                    {{
                                                    $i === $product->getUserRating()->rating
                                                    ? 'checked'
                                                    : ''
                                                    }}
                                                />
                                                <label class="star star-{{$i}}" for="star-{{$i}}"></label>
                                            @endfor
                                        @else
                                            <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                            <label class="star star-5" for="star-5"></label>
                                            <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                            <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                            <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                            <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                            <label class="star star-1" for="star-1"></label>
                                        @endif
                                    </div>
                                </div>
                                <input type="submit" value="submit">
                            </form>
                            @if(isUserFollowed($product))
                                <form action="{{route('wishlist.delete' , $product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete from wishes list">
                                </form>
                            @else
                                <form action="{{route('wishlist.add' , $product->id)}}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-sm btn-success" value="Add to wishes list">
                                </form>
                            @endif
                        </div>
                    @endif
                @endauth
            </div>
        </div>
        <hr>
        <div class="row-fluid">
            <div class="col-md-10 text-center">
                <h4>Description: </h4>
                <p>{{ $product->description }}</p>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/product-actions.js') }}" type="text/javascript"></script>
@endpush
