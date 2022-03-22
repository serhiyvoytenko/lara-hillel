@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('Create product') }}</h3>
                <hr>
            </div>
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        <input type="text"
                               class="form-control"
                               aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default"
                               name="title"
                               value="{{old("title")}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control"
                                  aria-label="With textarea"
                                  name="description">
                            {{old("description")}}
                        </textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Short Description</span>
                        <textarea class="form-control"
                                  aria-label="With textarea"
                                  name="short_description">
                            {{old("short_description")}}
                        </textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">SKU</span>
                        <input type="text"
                               class="form-control"
                               aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default"
                               name="sku"
                               value="{{old("sku")}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
                        <input type="text"
                               class="form-control"
                               aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default"
                               name="category"
                               value="{{old("category")}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="text"
                               class="form-control"
                               aria-label="Amount (to the nearest dollar)"
                               name="price"
                               value="{{old("price")}}">
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Discount</span>
                        <input type="text"
                               class="form-control"
                               aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default"
                               name="discount"
                               value="{{old("discount")}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Count</span>
                        <input type="text"
                               class="form-control"
                               aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default"
                               name="count"
                               value="{{old("count")}}">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file"
                               class="form-control"
                               id="inputGroupFile04"
                               aria-describedby="inputGroupFileAddon04"
                               aria-label="Upload"
                               name="thumbnail">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file"
                               class="form-control"
                               id="inputGroupFile04"
                               aria-describedby="inputGroupFileAddon04"
                               aria-label="Upload"
                               name="images[]"
                               multiple>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
