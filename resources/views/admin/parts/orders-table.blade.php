<tr>
    <td>{{ $order->id }}</td>
    <td>{{ $order->user->full_name }}</td>
    <td>{{ $order->created_at }}</td>
    <td>{{ $order->total . ' $' }}</td>
    <td><a class="btn btn-sm btn-warning" href="{{ route('admin.orders.show', $order) }}">Review order</a></td>
    <td>{{ $order->orderStatus->status }}</td>
</tr>
