@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">
                    {{ __('All orders') }}
                </h3>
            </div>
            <div>
                <table class="table table-secondary table-striped align-content-center">
                    <thead>
                    <th>{{ __('Order\'s ID') }}</th>
                    <th>{{ __('User name') }}</th>
                    <th>{{ __('Order\'s date') }}</th>
                    <th>{{ __('Order\'s total sum') }}</th>
                    <th>{{ __('Review order') }}</th>
                    <th>{{ __('Order\'s status') }}</th>
                    </thead>
                    <tbody>
                    @each('admin.parts.orders-table', $orders, 'order')
                    </tbody>
                </table>
            </div>

            <div class="col-sm-8">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection


