@component('mail::message')

    Уведомление для <h2>админа</h2> {{ $full_name }}

    @component('mail::button', ['url' => route('admin.orders.show', $orderId)])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
