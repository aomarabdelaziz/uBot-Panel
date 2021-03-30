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

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Error With SQLConnection</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $notify_sqlError }}, You can edit your sql connection from <a href="{{ route('panel.sql-settings') }}">Here</a></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <script>

            window.onload = function() {

                $('#modal-default').modal('show')
            }

        </script>
    @endisset






    <!-- /.modal -->

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
