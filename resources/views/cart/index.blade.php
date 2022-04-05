@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('Cart') }}</h3>
            </div>
            @if(session('warning'))
                <div class="alert alert-warning">
                        {{ session('warning') }}
                </div>
            @endif
            <div class="col-md-12">
                @if($cart->count() > 0)
                    <table class="table table-light">
                        <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tbody>

                        @each('cart.parts.product_view', $cart->content(), 'row')

                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">There are no products in cart</h3>
                @endif
                <table class="table table-primary" style="width: 50%; float: right;">
                    <tbody>
                    <tr>
                        <td colspan="2">&nbsp</td>
                        <td>Subtotal</td>
                        <td>{{ $cart->subtotal() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp</td>
                        <td>Tax</td>
                        <td>{{ $cart->tax() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp</td>
                        <td>Total</td>
                        <td>{{ $cart->total() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @auth
                <div class="col-md-12 text-right">
                    <a href="{{ route('home') }}" class="btn btn-outline-success">{{ __('Proceed to checkout') }}</a>
                </div>
            @endauth
        </div>
    </div>
@endsection
