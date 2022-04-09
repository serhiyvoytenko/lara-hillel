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
