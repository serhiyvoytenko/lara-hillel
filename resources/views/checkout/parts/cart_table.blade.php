<tr>
    <td>
        <img src="{{!Storage::exists($row->model->thumbnail) ? $row->model->thumbnail : Storage::url($row->model->thumbnail)}}" height="100" alt="">
    </td>
    <td>
        <a href="{{ route('products.show', $row->id) }}"><strong>{{ $row->name }}</strong></a>
    </td>
    <td>{{ $row->qty }}</td>
    <td>{{ $row->price }}$</td>
    <td>{{ $row->subtotal }}$</td>
</tr>
