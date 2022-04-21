@component('mail::message')
    # Introduction

    Уведомление для клиента {{ $full_name }}

    Your order delivered.

    @component('mail::button', ['url' => route('account.order.show', $orderId)])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
