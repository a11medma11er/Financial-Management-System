@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All
                    Products</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="col-sm-6 col-md-6 col-xl-2 mg-t-20">
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-slide-in-right"
                        data-toggle="modal" href="#modaldemo8">Add Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Section Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->Product_name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->section->name }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $product->id }}"
                                                data-product_name="{{ $product->Product_name }}"
                                                data-section_name="{{ $product->section->name }}"
                                                data-description="{{ $product->description }}" data-toggle="modal"
                                                href="#exampleModal2" title="edit"><i class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $product->id }}"
                                                data-product_name="{{ $product->Product_name }}" data-toggle="modal"
                                                href="#modaldemo9" title="delete"><i class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--add product modal-->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add product</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Products.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">product Name</label>
                                <input type="hidden" class="form-control" name="id" id="id" value="">
                                <input type="text" class="form-control" name="Product_name" id="Product_name"
                                    value="">
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sections</label>
                            <select name="section_id" id="section_id" class="form-control" required>
                                <option value="" selected disabled>Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit product </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Products.update') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="recipient-name" class="col-form-label"> product Name </label>
                                <input class="form-control" name="Product_name" id="product_name" value=""
                                    type="text">
                            </div>
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sections</label>
                            <select name="section_id" id="section_id" class="form-control" required>
                                <option value="" selected disabled>Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" value=""></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Delete product </h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('Products.destroy') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>?Are you sure you want to delete this section</p>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="product_name" id="product_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            var Product_name = button.data('Product_name')
            var name = button.data('name')
            var description = button.data('description')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #Product_name').val(Product_name)
            modal.find('.modal-body #name').val(name)
            modal.find('.modal-body #description').val(description)
        })


        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var product_name = button.data('product_name')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #product_name').val(product_name);
        })
    </script>
@endsection
