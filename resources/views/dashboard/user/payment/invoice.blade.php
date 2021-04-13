@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

<link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte_dashboard/dist/css/adminlte.min.css') }}">


<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>




@endpush
@section('title', 'uBot | Purchase EGP')
@section('content')

<div class="wrapper">

    @if(session('success'))
    <script>

        window.onload = function() {
            toastr.success("{{ session('success') }}")
        }

    </script>
    @endif




    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <form action="{{ route('panel.donate-paypal-buy') }}" method="GET">
                        <div class="row">



                            <div class="invoice p-3 mb-3" style="width: 90%">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> uBot, Inc.
                                            <small class="float-right">Date: {{ date('y/m/d') }}</small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong>uBot Service</strong><br>
                                            Email: abdelazizomar851.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        To
                                        <address>
                                            <strong>{{ auth()->user()->name }}</strong><br>
                                            Email: {{ auth()->user()->email }}
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Invoice id #{{ $invoice->id }}</b><br>
                                        <br>
                                        <b>Payment Due:</b> {{ date('y/m/d') }}<br>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Product</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{ $Amount }}</td>
                                                <td>Automatic Events</td>
                                                <td>${{ $Price }}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <p class="lead">Payment Methods:</p>
<!--                                        <img src="{{ asset('../../adminlte_dashboard/dist/img/credit/visa.png') }}" alt="Visa">
                                        <img src="{{ asset('../../adminlte_dashboard/dist/img/credit/mastercard.png') }}" alt="Mastercard">
                                        <img src="{{ asset('../../adminlte_dashboard/dist/img/credit/american-express.png') }}" alt="American Express">-->
                                        <img src="{{ asset('../../adminlte_dashboard/dist/img/credit/paypal2.png')}}" alt="Paypal">

                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">

                                        </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody><tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td>${{ $Price }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Fees</th>
                                                    <td>${{ $PaypalFees }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Total:</th>
                                                    <td>${{$Total}}</td>
                                                </tr>
                                                </tbody></table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                            Payment
                                        </button>
                                        <a href="{{ route('panel.invoice-cancel') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                                            <i class="fas fa-close"></i> Cancel Payment
                                        </a>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@push('js')


<script src="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('adminlte_dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('adminlte_dashboard/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

    });
    $(function () {
        $('.select2').select2()
    });



</script>




@endpush

