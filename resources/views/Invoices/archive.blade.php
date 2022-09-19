@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsectionn
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Invoices</span>
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
							<div class="card-header pb-0">
								<div class="row">
									<div class="col-md-6 col-sm-6 col-6">
										<div class="btn-group">
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">invoice number</th>
												<th class="border-bottom-0">invoice date</th>
												<th class="border-bottom-0">invoice due date</th>
												<th class="border-bottom-0">invoice status</th>
												<th class="border-bottom-0">Section</th>
                                                <th class="border-bottom-0">product</th>
                                                <th class="border-bottom-0">Discount</th>
                                                <th class="border-bottom-0">note</th>
                                                <th class="border-bottom-0">Payment_Date</th>
												<th class="border-bottom-0">Details</th>
											</tr>
										</thead>
										<tbody>
											@foreach($invoices as $invoice)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$invoice->invoice_number}}</td>
												<td>{{$invoice->invoice_Date}}</td>
												<td>{{$invoice->Due_date}}</td>
												<td>@if ($invoice->Status == 'Paid') 
													<span class="badge badge-success">{{$invoice->Status}}</span>
													@elseif($invoice->Status == 'Unpaid')
													<span class="badge badge-warning">{{$invoice->Status}}</span>
													@else
													<span class="badge badge-danger">{{$invoice->Status}}</span>
													@endif
												</td>
												<td>{{$invoice->section->name}}</td>
                                                <td>{{$invoice->product}}</td>
												<td>{{$invoice->Discount}}</td>
												<td>{{$invoice->note}}</td>
												<td>{{$invoice->payment_date}}</td>
												<td>
													<a href="{{ route('invoices.restore', $invoice->id) }}" class="btn btn-info btn-sm" title="Restore"><i class="las la-trash-restore"></i></a>
													</a>
													<form action="{{ route('invoices.delete', $invoice->id) }}" method="post" style="display: inline-block">
														@csrf
														@method('delete')
														<button type="submit" class="btn btn-danger btn-sm delete" title="Delete">
															<i class="fa fa-trash"></i>
														</button>
													</form>
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
				</div>
				<!-- row closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

@endsection