@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('invoices.Paidupdate', $invoice->id) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">invoice number</label>
                                <input type="text" class="form-control" id="inputName" name="invoice_number" value="{{ $invoice->invoice_number }}" readonly>
                                <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                            </div>
                            <div class="col">
                                <label>invoice date</label>
                                <input class="form-control fc-datepicker" name="invoice_Date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $invoice->invoice_Date }}" required readonly>
                            </div>
                            <div class="col">
                                <label>invoice due date</label>
                                <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $invoice->Due_date }}" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Section</label>
                                <input class="form-control" name=""
                                    type="text" value="{{ $invoice->section->name }}" required readonly>
                                    <input class="form-control" name="Section" type="hidden" value="{{ $invoice->section->id }}" required readonly>
                            </div>
                            <div class="col">
                                <label>Product</label>
                                <input class="form-control" name="product"
                                    type="text" value="{{ $invoice->product }}" placeholder="Enter Product" required readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Quantity</label>
                                <input type="text" class="form-control" id="inputName" name="Amount_collection" value="{{ $invoice->Amount_collection }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Amount commission</label>
                                <input type="text" class="form-control form-control-lg" id="Amount_Commission"
                                    name="Amount_Commission" placeholder="Amount commission" value="{{ $invoice->Amount_Commission }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Discount</label>
                                <input type="text" class="form-control form-control-lg" id="Discount" name="Discount"
                                    title="Discount" placeholder="Discount" value="{{ $invoice->Discount }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value=0 required readonly>
                            </div>
                            <div class="col">
                                <label>Rate VAT</label>
                                <input class="form-control" name="Rate_VAT"
                                    type="text" value="{{ $invoice->Rate_VAT }}" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Amount VAT</label>
                                <input type="text" class="form-control" id="Value_VAT" name="Value_VAT" value="{{ $invoice->Value_VAT }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Amount total VAT</label>
                                <input type="text" class="form-control" id="Total" name="Total" value="{{ $invoice->Total }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">Notes</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3" readonly>{{ $invoice->note }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">Status</label>
                                <select class="form-control SlectBox" name="Status" required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>select Status</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Partially">Partially</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Payment Date</label>
                                <input class="form-control fc-datepicker" name="Payment_Date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $invoice->Payment_Date }}" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="Section"]').on('change', function() {
                var id = $(this).val();
                var url = "{{ route('invoices.getproducts', ':id') }}";
                url = url.replace(':id', id);
                if (id) {
                    $.ajax({
                        url:  url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

    <script>
        function myFunction() {
            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            var Discount = parseFloat(document.getElementById("Discount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);
            var Amount_Commission2 = Amount_Commission - Discount;
            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {
                alert('Please enter Amount_Commission');
            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;
                var intResults2 = parseFloat(intResults + Amount_Commission2);
                sumq = parseFloat(intResults).toFixed(2);
                sumt = parseFloat(intResults2).toFixed(2);
                document.getElementById("Value_VAT").value = sumq;
                document.getElementById("Total").value = sumt;
            }
        }
    </script>
@endsection
