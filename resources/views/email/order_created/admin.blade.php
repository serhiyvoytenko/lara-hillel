@component('mail::message')

    Message for <h2>Administrator  {{ $full_name }}</h2>

    @component('mail::button', ['url' => route('admin.orders.show', $orderId)])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
