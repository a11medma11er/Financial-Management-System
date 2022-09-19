@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Sections</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All
                    Sections</span>
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
                        data-toggle="modal" href="#modaldemo8">Add Section</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Created by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>{{ $section->description }}</td>
                                        <td>{{ $section->created_by }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $section->id }}" data-name="{{ $section->name }}"
                                                data-description="{{ $section->description }}" data-toggle="modal"
                                                href="#exampleModal2" title="edit"><i class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $section->id }}" data-section_name="{{ $section->name }}"
                                                data-toggle="modal" href="#modaldemo9" title="delete"><i
                                                    class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add Sections</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Sections.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sections Name</label>
                                <input type="text" class="form-control" id="section_name" name="name">
                            </div>

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
            <!-- End Basic modal -->
        </div>
			        <!-- edit -->
					<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Edit Sections </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
									<form action="{{ route('Sections.update') }}" method="post">
										{{ csrf_field() }}
										{{ method_field('POST') }}
										<div class="form-group">
											<input type="hidden" name="id" id="id" value="">
											<label for="recipient-name" class="col-form-label"> Section Name </label>
											<input class="form-control" name="name" id="name" value=""
												type="text">
										</div>
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
				<!-- end edit -->


			        <!-- delete -->
					<div class="modal" id="modaldemo9">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">Delete Section </h6><button aria-label="Close" class="close"
										data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<form action="{{ route('Sections.destroy') }}" method="post">
									{{ method_field('delete') }}
									{{ csrf_field() }}
									<div class="modal-body">
										<p>?Are you sure you want to delete this section</p>
										<input type="hidden" name="id" id="id" value="">
										<input class="form-control" name="section_name" id="section_name" type="text" readonly>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-danger">Delete</button>
									</div>
							</div>
							</form>
						</div>
					</div>
					<!-- End Basic modal -->
    </div>
@endsection
@section('js')
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #description').val(description);
        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
@endsection
