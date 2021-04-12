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
@section('title', 'uBot | Notices')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item active">Notices</li>

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

                                    <form action="{{ route('panel.notices.index') }}" method="GET">
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

                                    <a class="Add-Reward btn btn-primary btn-sm"
                                       data-toggle="modal"
                                       href="#modal-default1">
                                        <i class="fas fa-plus">
                                        </i>
                                        Add Notice
                                    </a>
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h3 class="card-title">All Events Notices</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-striped projects" style="overflow-x: auto">
                                                <thead>
                                                <tr>

                                                    <th style="width: 2%;" class="text-center">
                                                        OrderId
                                                    </th>
                                                    <th style="width: 25%"  class="text-center">
                                                        Notice
                                                    </th>
                                                    <th  style="width: 5%" class="text-center">
                                                        Type
                                                    <th style="width: 2%" class="text-center">
                                                        Time
                                                    </th>
                                                    <th  style="width: 3%" class="text-center">
                                                        NoticeType
                                                    </th>

<!--                                                    <th style="width: 5%;" class="text-center">
                                                        NoticeColor
                                                    </th>-->
                                                    <th style="width: 5%;" class="text-center">
                                                        Service
                                                    </th>


                                                    <th style="width: 35%"  class="text-center">
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $index => $notice)
                                                    <tr>

                                                        <td class="text-center">
                                                            {{ $notice->OrderID }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $notice->Notice }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $notice->Type }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $notice->Time }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $notice->NoticeType }}
                                                        </td>

<!--                                                        <td class="text-center">
                                                            {{ $notice->NoticeColor }}
                                                        </td>-->
                                                        <td class="text-center">
                                                              <span class="badge {{ ( $notice->Service != 0 ? 'badge-success' : 'badge-danger') }}">
                                                              {{ ($notice->Service != 0 ? 'Enabled' : 'Disabled') }}
                                                            </span>
                                                        </td>
                                                        <td class="project-actions text-center">

                                                            <form class="d-inline-block" action="{{ route('panel.notices-update-service' , $notice->id)}}" method="POST" >
                                                                @csrf
                                                                @method('put')
                                                                <button type="submit"  class="btn {{ ( $notice->Service == 0 ? 'btn-success' : 'btn-danger') }}  btn-sm">
                                                                    <i class="fas fa-ban">
                                                                    </i>
                                                                    {{ ( $notice->Service == 0 ? 'Enable' : 'Disable') }}

                                                                </button>

                                                            </form>

                                                            <form class="d-inline-block" action="{{ route('panel.notices.destroy' , $notice->id)}}" method="POST" >
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"  class="btn btn-danger  btn-sm">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Delete

                                                                </button>

                                                            </form>

                                                            <a  data-id = "{{ $notice->id }}"
                                                                data-notice = "{{ $notice->Notice }}"
                                                                data-type = "{{ $notice->Type }}"
                                                                data-time = "{{ $notice->Time }}"
                                                                data-noticetype = "{{ $notice->NoticeType }}"
                                                                data-discord = "{{ $notice->Discord }}"
                                                                data-eventkey = "{{ $notice->EventKey }}"


                                                                data-toggle="modal"
                                                                class="Edit-Notice btn btn-warning btn-sm" href="#modal-default3">
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
                        <h4 class="modal-title">Add Notice to {{ $eventName }} event</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-route" action="{{ route('panel.notices.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">

                            <input type="hidden" value="{{$eventName}}" name="EventName">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Notice</label>
                                <textarea cols="5" rows="5" class="form-control @error('Notice') is-invalid @enderror" name="Notice" value="{{ old('Notice' , '') }}" placeholder="Your notice"></textarea>
                                @error('Notice')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Type</label>

                                <select class="select2"  name="Type" data-placeholder="Any" style="width: 100%;">
                                    <option selected disabled>Select Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Time</label>
                                <input type="number" class="form-control @error('Time') is-invalid @enderror" name="Time" value="{{ old('Time' , '') }}" placeholder="0">
                                @error('Time')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Notice Type</label>

                                <select class="select2"  name="NoticeType" data-placeholder="Any" style="width: 100%;">
                                    <option selected disabled>Notice Type</option>

                                        <option value="All">All</option>
                                        <option value="Global">Global</option>
                                        <option value="Notice">Notice</option>
                                        <option value="PM">PM</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Discord</label>

                                <select class="select2"  name="Discord" data-placeholder="Any" style="width: 100%;">
                                    <option selected disabled>Discord</option>

                                    <option value="true">Enable</option>
                                    <option value="false">Disable</option>

                                </select>
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
                        <h4 class="modal-title">Edit {{ $eventName }} event Notice </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-route" action="#" method="POST">
                        @csrf
                        @method('put')
                        <div class="modal-body">

                            <input type="hidden" value="{{$eventName}}" name="EventKey">
                            <input type="hidden" class="noticeID" value="" name="noticeID">



                            <div class="form-group">
                                <label for="exampleInputPassword1">Notice</label>
                                <textarea cols="5" rows="5" class="Notice-Edited form-control @error('Notice') is-invalid @enderror" name="Notice" value="{{ old('Notice' , '') }}" placeholder="Your notice"></textarea>
                                @error('Notice')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Type</label>

                                <select class="select2 Type-Edited"  name="Type" data-placeholder="Any" style="width: 100%;">
                                    @foreach($types as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Time</label>
                                <input type="number" class="NoticeTime-Edited form-control @error('Time') is-invalid @enderror" name="Time" value="{{ old('Time' , '') }}" placeholder="0">
                                @error('Time')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Notice Type</label>

                                <select class="select2 Notice-TypEdited"  name="NoticeType" data-placeholder="Any" style="width: 100%;">
                                    <option selected disabled>Notice Type</option>

                                    <option value="All">All</option>
                                    <option value="Global">Global</option>
                                    <option value="Notice">Notice</option>
                                    <option value="PM">PM</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Discord</label>

                                <select class="select2 Discord-Edited"  name="Discord" data-placeholder="Any" style="width: 100%;">
                                    <option selected disabled>Discord</option>

                                    <option value="TRUE">Enable</option>
                                    <option value="FALSE">Disable</option>

                                </select>
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
                let Edit_Button = document.getElementsByClassName('Edit-Notice');



                let data_id = button.data('id')
                let data_eventKey = button.data('eventkey')
                let data_eventNotice = button.data('notice')
                let data_eventNoticeType = button.data('type')
                let data_eventNoticeTime = button.data('time')
                let data_eventNoticeNoticeType = button.data('noticetype')
                let data_eventNoticeDiscord = button.data('discord')



                let modal = $(this)

                modal.find('.modal-body .EventName').val(data_eventKey);
                modal.find('.modal-body .noticeID').val(data_id);
                modal.find('.modal-body .Notice-Edited').val(data_eventNotice);
                modal.find('.modal-body .Type-Edited').val(data_eventNoticeType).change();
                modal.find('.modal-body .NoticeTime-Edited').val(data_eventNoticeTime);
                modal.find('.modal-body .Notice-TypEdited').val(data_eventNoticeNoticeType).change();;
                modal.find('.modal-body .Discord-Edited').val(data_eventNoticeDiscord).change();;



                modal.find('.form-route').attr('action' , `notices/${data_id}`)









            })
        });




    </script>




@endpush

