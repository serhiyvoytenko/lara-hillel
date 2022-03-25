@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('Edit product') }}</h3>
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
            <div class="col-md-12">
                @if (session('warn'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('warn') }}
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <form class="row g-3 needs-validation" novalidate method="POST"
                      action="{{route('admin.product.store')}}" enctype="multipart/form-data">
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
                        <button class="btn btn-outline-secondary" type="button">Select category</button>
                        <select class="form-select" id="inputGroupSelect03"
                                aria-label="Example select with button addon" name="category">
                            <option selected value="{{old("category")}}">Choose...</option>
{{--                            @foreach($categories as $category)--}}
{{--                                <option value="{{$category->title }}">{{$category->title }}</option>--}}
{{--                            @endforeach--}}
                        </select>
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
                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('Thumbnail') }}</label>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="#" id="thumbnail-preview" alt="" style="max-width: 100%;">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file"
                                           class="form-control"
                                           id="thumbnail"
                                           aria-describedby="inputGroupFileAddon04"
                                           aria-label="Upload"
                                           name="thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row images-wrapper"></div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file"
                                           onchange="readMultiFiles"
                                           class="form-control"
                                           id="images"
                                           aria-describedby="inputGroupFileAddon04"
                                           aria-label="Upload"
                                           name="images[]"
                                           multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/images-preview.js') }}" type="text/javascript"></script>
@endpush
