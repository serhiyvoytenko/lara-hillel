@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="row g-3 needs-validation" novalidate method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="title">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Short Description</span>
                        <textarea class="form-control" aria-label="With textarea" name="short_description"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">SKU</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="sku">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="category">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price">
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Discount</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="discount">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Count</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="count">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="thumbnail">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="images" multiple>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
