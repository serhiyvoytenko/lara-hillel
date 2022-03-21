@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
                        <td>{{$product->image_id}}</td>
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
