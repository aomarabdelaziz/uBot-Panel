@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush()
@section('title', 'uBot | Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item actv ">Panel</li>

@endsection

@section('content')
    @if(session('success'))
        <script>

            window.onload = function() {
                toastr.success("{{ session('success') }}")
            }

        </script>
    @endif

    @if(session('error'))
        <script>

            window.onload = function() {
                toastr.error("{{ session('error') }}")
            }

        </script>
    @endif

    @if($notify_sqlError)
        <script>

            window.onload = function() {
                toastr.error("{{ $notify_sqlError }}")
            }

        </script>
    @endisset

@endsection


@push('js')


    <script src="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('adminlte_dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>


    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

        });



    </script>




@endpush
