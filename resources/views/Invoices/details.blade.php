@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    Invoice Details
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Invoice List</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Invoice Details</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">Invoice
                                                    Details</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">Invoice Status</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">Attachments</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">
                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Invoice Number</th>
                                                            <td>{{ $invoices->invoice_number }}</td>
                                                            <th scope="row">Invoice Date</th>
                                                            <td>{{ $invoices->invoice_Date }}</td>
                                                            <th scope="row">Due Date</th>
                                                            <td>{{ $invoices->Due_date }}</td>
                                                            <th scope="row">Section</th>
                                                            <td>{{ $invoices->Section->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Product</th>
                                                            <td>{{ $invoices->product }}</td>
                                                            <th scope="row"> Amount collection </th>
                                                            <td>{{ $invoices->Amount_collection }}</td>
                                                            <th scope="row"> Amount Commission </th>
                                                            <td>{{ $invoices->Amount_Commission }}</td>
                                                            <th scope="row">Discount</th>
                                                            <td>{{ $invoices->Discount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"> Rate tax </th>
                                                            <td>{{ $invoices->Rate_VAT }}</td>
                                                            <th scope="row"> Value tax </th>
                                                            <td>{{ $invoices->Value_VAT }}</td>
                                                            <th scope="row"> Total </th>
                                                            <td>{{ $invoices->Total }}</td>
                                                            <th scope="row"> Status </th>
                                                            @if ($invoices->Status == 'Paid')
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $invoices->Status }}</span>
                                                                </td>
                                                            @elseif($invoices->Status == 'Unpaid')
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"> Description </th>
                                                            <td>{{ $invoices->note }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th> Invoice Namber </th>
                                                            <th> Product </th>
                                                            <th>Section</th>
                                                            <th> Status </th>
                                                            <th> Date </th>
                                                            <th> Note </th>
                                                            <th> Add date </th>
                                                            <th> Add by </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($invoices_details as $x)
                                                            <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $x->invoice_number }}</td>
                                                                <td>{{ $x->product }}</td>
                                                                <td>{{ $invoices->Section->name }}</td>
                                                                @if ($x->Status == 'Paid')
                                                                    <td><span
                                                                            class="badge badge-pill badge-success">{{ $x->Status }}</span>
                                                                    </td>
                                                                @elseif($x->Status == 'Unpaid')
                                                                    <td><span
                                                                            class="badge badge-pill badge-danger">{{ $x->Status }}</span>
                                                                    </td>
                                                                @else
                                                                    <td><span
                                                                            class="badge badge-pill badge-warning">{{ $x->Status }}</span>
                                                                    </td>
                                                                @endif
                                                                <td>{{ $x->Payment_Date }}</td>
                                                                <td>{{ $x->note }}</td>
                                                                <td>{{ $x->created_at }}</td>
                                                                <td>{{ $x->user }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th scope="col">#</th>
                                                            <th scope="col"> File name </th>
                                                            <th scope="col"> Add by </th>
                                                            <th scope="col"> Add date </th>
                                                            <th scope="col"> opration </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($invoices_attachments as $attachment)
                                                            <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $attachment->file_name }}</td>
                                                                <td>{{ $attachment->Created_by }}</td>
                                                                <td>{{ $attachment->created_at }}</td>
                                                                <td colspan="2">
                                                                    <a class="btn btn-outline-info btn-sm"
                                                                        href="{{ route('attachment.download', $attachment->id) }}"
                                                                        role="button"><i class="fas fa-download"></i>&nbsp;
                                                                        Download</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection
