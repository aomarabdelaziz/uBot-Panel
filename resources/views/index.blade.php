@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/pace-progress/themes/black/pace-theme-flat-top.css') }}">

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


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @can('access-event')
                <div class="col-md-12">


                        <form class="d-inline-block" action="#" method="POST"
                              onclick="event.preventDefault(); startBotAjax();">
                            @csrf

                            <button type="submit"  class="btn btn-app">
                                <i class="fa fa-play"></i> Start

                            </button>

                        </form>

                        <form class="d-inline-block" action="#" method="POST"
                              onclick="event.preventDefault(); restartBotAjax();">
                            @csrf

                            <button type="submit"  class="btn btn-app">
                                <i class="fa fa-undo"></i> Restart

                            </button>

                        </form>

                        <form class="d-inline-block" action="#" method="POST"
                              onclick="event.preventDefault(); closeBotAjax();">
                            @csrf

                            <button type="submit"  class="btn btn-app">
                                <i class="fa fa-times"></i> Close

                            </button>

                        </form>





                </div>
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Events</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 15%" class="text-center">
                                        #
                                    </th>
                                    <th style="width: 15%" class="text-center">
                                        EventName
                                    </th>
                                    <th style="width: 15%" class="text-center">
                                        Running
                                    </th>
                                    <th style="width: 15%" class="text-center">
                                        Active
                                    </th>

                                    <th style="width: 15%" class="text-center">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $index => $event)
                                    <tr>
                                        <td class="text-center">
                                            {{ $index }}
                                        </td>
                                        <td class="text-center">
                                            {{ $event->EventName }}
                                        </td>


                                        <td class="text-center">
                                                  <span class="badge {{ ( $event->Running != 0 ? 'badge-success' : 'badge-danger') }}">
                                                      {{ ($event->Running != 0 ? 'Running' : 'Not Running') }}
                                                  </span>

                                        </td>
                                        <td class="text-center">
                                                  <span class="badge {{ ( $event->Active != 0 ? 'badge-success' : 'badge-danger') }}">
                                                      {{ ($event->Active != 0 ? 'Enabled' : 'Disabled') }}
                                                  </span>

                                        </td>
                                        <td class="project-actions text-center">





                                            <form class="d-inline-block" action="{{ route('panel.panel-home-update' , $event->id)}}" method="POST" >
                                                @csrf
                                                @method('put')
                                                <button type="submit"  class="btn {{ ( $event->Active == 0 ? 'btn-success' : 'btn-danger') }}  btn-sm">
                                                    <i class="fas fa-ban">
                                                    </i>
                                                    {{ ( $event->Active == 0 ? 'Enable' : 'Disable') }}

                                                </button>

                                            </form>


                                        </td>
                                    </tr>
                                    @endforeach

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">

                        </div>
                    </div>
                </div>
                @endcan

            </div>
        </div>
    </section>




    <!-- /.modal -->

@endsection


@push('js')


    <script src="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('adminlte_dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('adminlte_dashboard/plugins/pace-progress/pace.min.js') }}"></script>


    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });




        });


        function startBotAjax() {

            Pace.restart();
            $.ajax({

                url: "{{ route('panel.panel-start-bot') }}",
                type: "post",
                dataType: "json",
                success: function (data) {

                    if(data.error) {
                        toastr.error(data.error)
                    }
                    else if(data.success) {
                        toastr.success(data.success)
                    }
                },
                error: function (data) {

                    toastr.error(data.error)
                }

            });


        }
        function restartBotAjax() {

            Pace.restart();
            $.ajax({

                url: "{{ route('panel.panel-restart-bot') }}",
                type: "post",
                dataType: "json",
                success: function (data) {

                    if(data.error) {
                        toastr.error(data.error)
                    }
                    else if(data.success) {
                        toastr.success(data.success)
                    }
                },
                error: function (data) {

                    toastr.error(data.error)
                }

            });


        }
        function closeBotAjax() {

            Pace.restart();
            $.ajax({

                url: "{{ route('panel.panel-close-bot') }}",
                type: "post",
                dataType: "json",
                success: function (data) {


                    if(data.error) {
                        toastr.error(data.error)
                    }
                    else if(data.success) {
                        toastr.success(data.success)
                    }

                },
                error: function (data) {

                    toastr.error(data.error)
                }

            });


        }



    </script>




@endpush
