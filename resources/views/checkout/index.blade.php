@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="row">
                <div class="table-responsive col-md-6">
                    <form method="POST" action="{{route('order')}}">
                        @csrf
                        <table class="table table-secondary table-striped">
                            <thead>
                            <tr>
                                <th>Enter your data:</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="text" name="name" placeholder="First name"> First name of recipient
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" name="surname" placeholder="Last name"> Last name of recipient
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" name="phone" placeholder="Phone"> Phone of recipient</td>
                            </tr>
                            <tr>
                                <td><input type="email" name="email" placeholder="Email"> Email of recipient</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="country" placeholder="County"> Country of recipient</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="city" placeholder="City"> City of recipient</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="address" placeholder="Address"> Address of recipient</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-primary">Create order
                                    </button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
                <div class="table-responsive col-md-6">
                    <table class="table table-secondary table-striped">
                        <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('checkout.parts.cart_table', $cart->content(), 'row')
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <a href="{{route('cart')}}" class="btn btn-sm btn-primary">Edit order
                                </a>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <table class="table table-warning table-striped" style="width: 50%; float: right;">
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
                        <tfoot>
                        <tr>
                            <td colspan="4">
                                @include('checkout.payments.paypal')
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
