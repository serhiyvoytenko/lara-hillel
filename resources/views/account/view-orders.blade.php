@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">
                    {{ __('All orders') }}
                </h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @empty(Auth::user()->telegram_id)
                        <script async
                                src="https://telegram.org/js/telegram-widget.js?19"
                                data-telegram-login="{{ config('services.telegram-bot-api.name') }}"
                                data-size="large"
                                data-radius="10"
                                data-request-access="write"
                                data-auth-url="{{ route('account.telegram.callback') }}"
                        ></script>
                    @endempty
                </div>
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
                    @each('account.parts.orders-table', $orders, 'order')
                    </tbody>
                </table>
            </div>

            <div class="col-sm-8">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
