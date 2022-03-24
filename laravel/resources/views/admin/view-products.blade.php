@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('Products') }}</h3>
            </div>
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Title</th>
                        <th scope="col">Short Description</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-center" scope="col"><img src="{{ Storage::url($product->thumbnail) }}" width="75" height="100" alt=""></td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->short_description}}</td>
                        <td>{{$product->sku}}</td>
                        <td>{{$product->category()->first()->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount}}</td>
                        <td>{{$product->count}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{($products)}}
            </div>
        </div>
    </div>

@endsection
