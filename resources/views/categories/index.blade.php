@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('View categories') }}</div>
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
                                            <th class="text-center">Title category</th>
                                            <th class="text-center">Quantity products</th>
                                        </tr>
                                    </thead>
                                    @each('categories.parts.category_row', $categories, 'category')
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
