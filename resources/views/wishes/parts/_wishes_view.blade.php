<tr class="text-center">
    <td>
        <a href="{{route('products.show' , $wish->id)}}">
            <img class="bd-placeholder-img card-img-top"
                 style="width: 70px; height: 70px; margin: 0 auto; display: block;"
                 src="{{!Storage::exists($wish->thumbnail) ? $wish->thumbnail : Storage::url($wish->thumbnail)}}">
        </a>
    </td>
    <td>
        <b><p class="card-text">{{$wish->title}}</p></b>
        <p>{{$wish->short_description}}</p>
    </td>
    <td>
        <a href="{{route('products.show' , $wish->id)}}" type="button"
           class="btn btn-sm btn-secondary">
            View details
        </a>
    </td>
    <td>
        {{ $wish->available ? 'Product is available' : 'Product isn\'t available' }}
    </td>
    <td>
        <form action="{{route('wishlist.delete' , $wish->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-sm btn-danger" value="Delete from wishes list">
        </form>
    </td>
</tr>
