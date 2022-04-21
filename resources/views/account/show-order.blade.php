@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="text-center">{{ __('Order №' . $order->id . ' created at: ' . $order->created_at) . '.'}}</h4>
            </div>
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <form action="{{ route('account.order.cancel', $order) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-secondary table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('Fields') }}</th>
                            <th>{{ __('Values') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{__('Full name customer:')}}</td>
                            <td>{{ $order->user->full_name }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Status:')}}</td>
                            <td>{{ __($order->orderStatus->status) }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Phone:')}}</td>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Email:')}}</td>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Country:')}}</td>
                            <td>{{ $order->country }}</td>
                        </tr>
                        <tr>
                            <td>{{__('City:')}}</td>
                            <td>{{ $order->city }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Address')}}</td>
                            <td>{{ $order->address }}</td>
                        </tr>
                        <tfoot>
                        <tr>
                            <td>{{__('Total:')}}</td>
                            <td>{{ $order->total }}</td>
                        </tr>
                        </tfoot>
                        </tbody>
                    </table>
                    <input type="submit" class="btn btn-sm btn-warning" value="Cancel order">
                    <a class="btn btn-sm btn-primary" href="{{ route('account.orders.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
