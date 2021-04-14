@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/daterangepicker/daterangepicker.css') }}">


    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>




@endpush
@section('title', 'uBot | Schedule')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item active">Schedule</li>

@endsection
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

                            <div class="col-md-6">
                                <div class="form-group">

                                    <form action="{{ route('panel.schedule.index') }}" method="GET">
                                        <div class="row">


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <select class="select2 event-name"  name="event_name" data-placeholder="Any" style="width: 100%;">
                                                        <option selected disabled>Select event</option>
                                                        @foreach($events as $event)
                                                            <option  {{ ( $event == $eventName) ? 'selected' : '' }}>{{ $event }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Search</button>
                                            </div>



                                        </div>
                                    </form>








                                </div>

                            </div>
                            @if($eventName)
                                <div class="col-md-12">


                                       <a class="Add-Schedule btn btn-primary btn-sm"
                                          data-toggle="modal"
                                          href="#modal-default1">
                                           <i class="fas fa-plus">
                                           </i>
                                           Add Schedule
                                       </a>
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h3 class="card-title">All Events Schedule</h3>

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
                                                    <th style="width: 8%;" class="text-center">
                                                        #
                                                    </th>
                                                    <th style="width: 10%"  class="text-center">
                                                        Day
                                                    </th>
                                                    <th  class="text-center">
                                                        Time
                                                    <th  class="text-center">
                                                        EventName
                                                    </th>

                                                    <th class="text-center">
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $index => $event)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $index }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $event->Day }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $event->Time }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $event->EventName }}
                                                        </td>
                                                        <td class="project-actions text-center">
                                                            <form class="d-inline-block" action="{{ route('panel.schedule.destroy' , $event->id)}}" method="POST" >
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"  class="btn btn-danger  btn-sm">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Delete

                                                                </button>

                                                            </form>





                                                        <a  data-event_key="{{ $event->EventName }}"
                                                                                            data-id="{{ $event->id }}"
                                                                                            data-event_day="{{ $event->Day }}"
                                                                                            data-event_time="{{$event->Time}}"

                                                                                            data-toggle="modal"
                                                                                            class="Edit-Schedule btn btn-warning btn-sm" href="#modal-default3">
                                                                                            <i class=" fas fa-edit">
                                                                                            </i>
                                                                                            Edit
                                                                                        </a>


                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">
                                            <ul class="pagination pagination-sm m-0 float-right">
                                                {{ $data->appends(request()->query())->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @elseif(!$eventName)
                                <div class="col-md-12">

                                   @if(!is_null($eventName))
                                        <a class="Add-Reward btn btn-primary btn-sm"
                                           data-toggle="modal"
                                           href="#modal-default1">
                                            <i class="fas fa-plus">
                                            </i>
                                            Add Schedule
                                        </a>
                                       @endif
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h3 class="card-title">All Events Schedule</h3>

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
                                                    <th style="width: 8%;" class="text-center">
                                                        #
                                                    </th>
                                                    <th style="width: 10%"  class="text-center">
                                                        Day
                                                    </th>
                                                    <th  class="text-center">
                                                        Time
                                                    <th  class="text-center">
                                                        EventName
                                                    </th>

                                                    <th class="text-center">
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $index => $event)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $index }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $event->Day }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $event->Time }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $event->EventName }}
                                                        </td>
                                                        <td class="project-actions text-center">



                                                            <form class="d-inline-block" action="{{ route('panel.schedule.destroy' , $event->id)}}" method="POST" >
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"  class="btn btn-danger  btn-sm">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Delete

                                                                </button>

                                                            </form>





                                                        <a  data-event_key="{{ $event->EventName }}"
                                                                                            data-id="{{ $event->id }}"
                                                                                            data-event_day="{{ $event->Day }}"
                                                                                            data-event_time="{{$event->Time}}"

                                                                                            data-toggle="modal"
                                                                                            class="Edit-Schedule btn btn-warning btn-sm" href="#modal-default3">
                                                                                            <i class=" fas fa-edit">
                                                                                            </i>
                                                                                            Edit
                                                                                        </a>


                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">
                                            <ul class="pagination pagination-sm m-0 float-right">
                                                {{ $data->appends(request()->query())->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif



                        </div>


                    </div>
                </div>
            </div>
        </section>



        <!-- Modals -->
        <div class="modal fade" id="modal-default1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Schedule to {{ $eventName }} event</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-route" action="{{ route('panel.schedule.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">

                            <input type="hidden" value="{{$eventName}}" name="EventName">


                            <div class="form-group">
                                <label for="exampleInputText">Day</label>

                                <select class="form-control" name="Day">
                                    <option value="Daily"> Daily </option>
                                    <option value="Sunday"> Sunday </option>
                                    <option value="Monday"> Monday </option>
                                    <option value="Tuesday"> Tuesday </option>
                                    <option value="Wednesday"> Wednesday </option>
                                    <option value="Thursday"> Thursday </option>
                                    <option value="Friday"> Friday </option>
                                    <option value="Saturday"> Saturday </option>
                                </select>
                                @error('Day')
                                <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message  }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Time picker</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="Time" data-target="#timepicker">
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                    @error('Time')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message  }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.input group -->
                            </div>



                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modal-default3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit {{ $eventName }} event Schedule </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-route" action="#" method="POST">
                            @csrf
                            @method('put')
                            <div class="modal-body">

                                <input type="hidden" value="{{$eventName}}" name="EventName">
                                <input type="hidden" class="oldTime" value="" name="oldTime">
                                <input type="hidden" class="oldDay" name="oldDay">


                                <div class="form-group">
                                    <label for="exampleInputText">Day</label>

                                    <select class="form-control EventDay" name="Day">
                                        <option value="Daily"> Daily </option>
                                        <option value="Sunday"> Sunday </option>
                                        <option value="Monday"> Monday </option>
                                        <option value="Tuesday"> Tuesday </option>
                                        <option value="Wednesday"> Wednesday </option>
                                        <option value="Thursday"> Thursday </option>
                                        <option value="Friday"> Friday </option>
                                        <option value="Saturday"> Saturday </option>
                                    </select>
                                    @error('Day')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message  }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Time picker</label>

                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input EventTime" name="Time" data-target="#timepicker">
                                        <div class="input-group-append " data-target="#timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                        @error('Time')
                                        <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message  }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <!-- /.input group -->
                                </div>



                            </div>


                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
    </div>

@endsection
@push('js')


    <script src="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('adminlte_dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('adminlte_dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('adminlte_dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('adminlte_dashboard/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'hh:mm:ss A'
            })
            $('.select2').select2()

            $('#modal-default3').on('show.bs.modal', function(event) {


                var button = $(event.relatedTarget)
                let Edit_Button = document.getElementsByClassName('Edit-Schedule');



                let data_id = button.data('id')
                let data_eventKey = button.data('event_key')
                let data_eventDay = button.data('event_day')
                let data_eventTime = button.data('event_time')

                console.log(data_eventTime)

                let modal = $(this)
                modal.find('.modal-body .EventDay').val(data_eventDay);
                modal.find('.modal-body .EventTime').val(data_eventTime);

                modal.find('.modal-body .oldDay').val(data_eventDay);
                modal.find('.modal-body .oldTime').val(data_eventTime);


                //'
                modal.find('.form-route').attr('action' , `schedule/${data_id}`)









            })
        });




    </script>




@endpush

