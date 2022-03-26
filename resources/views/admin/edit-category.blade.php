@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('Edit category') }}</h3>
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
                      action="{{route('admin.category.update', $category)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        <input type="text"
                               class="form-control"
                               aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default"
                               name="title"
                               value="{{$category->title}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control"
                                  aria-label="With textarea"
                                  name="description">
                            {{$category->description}}
                        </textarea>
                    </div>
                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('Thumbnail') }}</label>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="{{Storage::url($category->thumbnail)}}" id="thumbnail-preview" alt=""
                                         style="max-width: 100%;">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file"
                                           class="form-control"
                                           id="thumbnail"
                                           aria-describedby="inputGroupFileAddon04"
                                           aria-label="Upload"
                                           name="thumbnail"
                                           value="{{$category->thumbnail}}"
                                    placeholder="{{$category->thumbnail}}"
                                    >
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
    <script src="{{ asset('js/category-images-preview.js') }}" type="text/javascript"></script>
@endpush
