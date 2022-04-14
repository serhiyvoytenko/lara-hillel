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
                                <table class="table table-secondary table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Thumbnail</th>
                                        <th class="text-center">Title and description</th>
                                        <th class="text-center">Show detail</th>
                                        <th class="text-center">Available</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                    </thead>
                                    @each('wishes.parts._wishes_view', $wishes, 'wish')
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex p-3 justify-content-center">
                    {{($wishes)}}
                </div>
            </div>
        </div>
    </div>
@endsection
