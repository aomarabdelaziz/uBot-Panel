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

            @if($errors->any())
                <script>

                    window.onload = function() {
                        toastr.error("{{ $errors->first() }}")
                    }

                </script>
            @endif


            <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">

                                    <form action="{{ route('panel.invoice-index') }}" method="GET">
                                        <div class="row">


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <select class="select2"  name="package" data-placeholder="Any" style="width: 100%;">
                                                        <option selected disabled>Select Package</option>
                                                        <option value="400">1 Month / 400EGP</option>
                                                        <option value="1200">3 Month / 1200EGP</option>
                                                        <option value="2400">6 Month / 2400EGP</option>
                                                        <option value="4800">1 Year / 4800EGP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info">Continue</button>
                                            </div>


                                        </div>
                                    </form>



                                </div>
                            </div>


                        </div>

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

