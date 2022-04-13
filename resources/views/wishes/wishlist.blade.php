@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Wishes List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                    @each('wishes.parts._wishes_view', $wishes, 'wishes')
                                </div>
                            </div>
                        </div>
                        <div class="d-flex p-3 justify-content-center">
                            {{($wishes)}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
