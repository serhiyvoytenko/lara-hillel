<tr>
    <td>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="{{url('categories/' . $category->id)}}" type="button"
               class="btn btn-outline-primary btn-sm ">{{$category->title}}</a>
        </div>
    </td>
    <td class="text-center">
        {{$category->products()->count()}}
    </td>
</tr>
