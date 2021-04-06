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
@section('title', 'uBot | Warps And Hints')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item">Search Events</li>
    <li class="breadcrumb-item active">Warps & Hints</li>

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


            @if(session('error'))
                <script>

                    window.onload = function() {
                        toastr.error("{{ session('error') }}")
                    }

                </script>
            @endif


        @if($errors->any())
                <script>
                    window.onload = function () {
                        $('#modal-default').modal('show');
                    }
                </script>
            @endif
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">

                                    <form action="{{ route('panel.search-warps-hints.index') }}" method="GET">
                                        <div class="row">


                                            <div class="col-md-2">

                                                <div class="form-group">
                                                    <select class="select2 event-name"  name="event_name" data-placeholder="Any" style="width: 100%;">
                                                        <option selected disabled>Select event</option>


                                                        @foreach($EVENTS as $event)
                                                            <option  {{ ( $event == $eventName) ? 'selected' : '' }}>{{ $event }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">

                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ old('WarpKey' , $warpKey) }}" name="warp_key" placeholder="WarpKey">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Search</button>
                                            </div>


                                        </div>
                                    </form>




                                </div>
                            </div>

                      <div class="col-md-12">

                          <a class="Add-Warp btn btn-primary btn-sm" href="#">
                              <i class="fas fa-plus">
                              </i>
                              Add Warp
                          </a>
                          <div class="card mt-2">
                              <div class="card-header">
                                  <h3 class="card-title">Warps</h3>

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
                                          <th style="width: 8%" class="text-center">
                                              #
                                          </th>
                                          <th style="width: 8%" class="text-center">
                                              Warp Key
                                          </th>
                                          <th style="width: 8%" class="text-center">
                                              wRegionID
                                          </th>
                                          <th style="width: 8%" class="text-center">
                                              PosX
                                          </th>
                                          <th style="width: 8%" class="text-center">
                                              PosY
                                          </th>
                                          <th style="width: 8%" class="text-center">
                                              PosZ
                                          </th>
                                          <th style="width: 8%" class="text-center">
                                              WorldID
                                          </th>
                                          <th style="width: 12%" class="text-center">
                                              EventKey
                                          </th>
                                          <th style="width: 8%" class="text-center">
                                              Service
                                          </th>
                                          <th class="text-center">
                                          </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($all_warps as $index => $warp)
                                          <tr>
                                              <td class="text-center">
                                                  {{ $index }}
                                              </td>
                                              <td class="text-center">
                                                  {{ $warp->WarpKey }}
                                              </td>
                                              <td class="text-center">
                                                  {{ $warp->wRegionID }}
                                              </td>
                                              <td class="text-center">
                                                  {{ $warp->PosX }}
                                              </td>
                                              <td class="text-center">
                                                  {{ $warp->PosY }}
                                              </td>
                                              <td class="text-center">
                                                  {{ $warp->PosZ }}
                                              </td>
                                              <td class="text-center">
                                                  {{ $warp->WorldID }}
                                              </td>
                                              <td class="text-center">
                                                  {{ $warp->EventKey }}
                                              </td>
                                              <td class="text-center">
                                                  <span class="badge {{ ( $warp->Service != 0 ? 'badge-success' : 'badge-danger') }}">
                                                      {{ ($warp->Service != 0 ? 'Enabled' : 'Disabled') }}
                                                  </span>

                                              </td>
                                              <td class="project-actions text-center">



                                                  <form class="d-inline-block" action="{{ route('panel.search-warps-hints.destroy' , $warp->WarpKey)}}" method="POST" >
                                                      @csrf
                                                      @method('delete')
                                                      <button type="submit"  class="btn {{ ( $warp->Service == 0 ? 'btn-success' : 'btn-danger') }}  btn-sm">
                                                          <i class="fas fa-trash">
                                                          </i>
                                                          Delete

                                                      </button>

                                                  </form>





                                                  <a  data-warp_key="{{ $warp->WarpKey }}"
                                                      data-warp_id="{{ $warp->id }}"
                                                      data-event_name="{{ $warp->EventKey }}"
                                                      data-wregion_id="{{$warp->wRegionID}}"
                                                      data-posx="{{$warp->PosX}}"
                                                      data-posy="{{$warp->PosY}}"
                                                      data-posz="{{$warp->PosZ}}"
                                                      data-worldid="{{$warp->WorldID}}"
                                                      data-service="{{$warp->Service}}"
                                                      data-toggle="modal"
                                                      class="Edit-Warp btn btn-warning btn-sm" href="#modal-default3">
                                                      <i class=" fas fa-edit">
                                                      </i>
                                                      Edit
                                                  </a>



                                                  <form class="d-inline-block" action="{{ route('panel.search-warps-update-service' , $warp->id)}}" method="POST" >
                                                      @csrf
                                                      @method('put')
                                                      <button type="submit"  class="btn {{ ( $warp->Service == 0 ? 'btn-success' : 'btn-danger') }}  btn-sm">
                                                          <i class="fas fa-ban">
                                                          </i>
                                                          {{ ( $warp->Service == 0 ? 'Enable' : 'Disable') }}

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
                                  <ul class="pagination pagination-sm m-0 float-right">
                                      {{ $all_warps->appends(request()->query())->links() }}
                                  </ul>
                              </div>
                          </div>
                      </div>




                      <div class="col-md-12">


                          <a class="Add-Hint btn btn-primary btn-sm" href="#">
                              <i class="fas fa-plus">
                              </i>
                              Add Hint
                          </a>
                         <div class="card mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Hints</h3>

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
                                                <th style="width: 4%"  class="text-center">
                                                    #
                                                </th>
                                                <th style="width: 6%" class="text-center">
                                                    Hint ID
                                                </th>
                                                <th style="width: 4%" class="text-center">
                                                    WarpKey
                                                </th>
                                                <th  class="text-center">
                                                    Hint Message
                                                </th>
                                                <th class="text-center">
                                                    EventKey
                                                </th>



                                                <th class="text-center">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($all_hints as $index => $hint)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $index }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $hint->HintID }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $hint->WarpKey }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $hint->HintMessage }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $hint->EventKey }}
                                                    </td>

                                                    <td class="project-actions text-center">

                                                        <form class="d-inline-block" action="{{ route('panel.search-warps-delete-hint' , $hint->id)}}" method="POST" >
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"  class="btn btn-danger  btn-sm">
                                                                <i class="fas fa-trash">
                                                                </i>
                                                                Delete

                                                            </button>

                                                        </form>

                                                        <a class="btn btn-warning btn-sm" href="#">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                             <div class="card-footer clearfix">
                                 <ul class="pagination pagination-sm m-0 float-right">
                                     {{ $all_hints->appends(request()->query())->links() }}
                                 </ul>
                             </div>
                                </div>
                     </div>



                        </div>



                    </div>
                </div>
            </div>


        </section>
         <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Warp/Hint</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('panel.search-warps-hints.store')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Event</label>
                                    <select required class="select2 event-name @error('event_name') is-invalid @enderror"  name="event_name" data-placeholder="Any" style="width: 100%;">
                                        <option selected disabled>-- Select event --</option>
                                        @foreach($EVENTS as $index=> $event)
                                            <option {{ ( $event == $eventName) ? 'selected' : '' }}>{{ $event }}</option>
                                        @endforeach
                                        @error('event_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message  }}</strong>
                                        </span>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Warp Key</label>
                                    <input required type="text" value="{{ old('WarpKey' ?? '') }}" name="WarpKey" class="form-control @error('WarpKey') is-invalid @enderror"  placeholder="Enter WarpKey">
                                    @error('WarpKey')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Charname</label>
                                    <input required type="text" value="{{ old('Charname' ?? '') }}" name="Charname" class="form-control @error('Charname') is-invalid @enderror"  placeholder="Enter Charname">
                                    @error('Charname')
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message  }}</strong>
                                  </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">WorldID</label>
                                    <input required type="number"   value="{{ old('WorldID' ?? '') }}"  name="WorldID" class="form-control  @error('WorldID') is-invalid @enderror"  placeholder="Enter WorldID">
                                    @error('WorldID')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hint Message</label>
                                    <input required type="text"   value="{{ old('HintMessage' ?? '') }}"  name="HintMessage" class="form-control  @error('HintMessage') is-invalid @enderror"  placeholder="Enter Hint Message">
                                    @error('HintMessage')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
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

         <div class="modal fade" id="modal-default2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Warp/Hint</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('panel.search-warps-add-hints')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Event</label>
                                    <select required class="select2 event-name @error('event_name') is-invalid @enderror"  name="event_name" data-placeholder="Any" style="width: 100%;">
                                        <option selected disabled>-- Select event --</option>
                                        @foreach($EVENTS as $index=> $event)
                                            <option {{ ( $event == $eventName) ? 'selected' : '' }}>{{ $event }}</option>
                                        @endforeach
                                        @error('event_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message  }}</strong>
                                        </span>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Warp Key</label>
                                    <select  required class="select2  @error('WarpKey') is-invalid @enderror"  name="WarpKey" data-placeholder="Any" style="width: 100%;">
                                        <option selected  disabled>-- Select WarpKey --</option>
                                        @foreach($WarpKeys as $index=> $warp)
                                            <option>{{ $warp->WarpKey }}</option>
                                        @endforeach
                                        @error('WarpKey')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message  }}</strong>
                                        </span>
                                        @enderror
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hint Message</label>
                                    <input type="text"   value="{{ old('HintMessage' ?? '') }}"  name="HintMessage" class="form-control  @error('HintMessage') is-invalid @enderror"  placeholder="Enter Hint Message" required>
                                    @error('HintMessage')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
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
                            <h4 class="modal-title">Add New Warp/Hint</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-route" action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">


                                <input type="hidden" name="oldWarpKey" class="oldWarpKey" value="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Warp Key</label>
                                    <input required type="text" value="{{ old('WarpKey' ?? '') }}" name="WarpKey" class="WarpKey form-control @error('WarpKey') is-invalid @enderror"  placeholder="Enter WarpKey">
                                    @error('WarpKey')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Charname</label>
                                    <input required type="text" value="{{ old('Charname' ?? '') }}" name="Charname" class="Charname form-control @error('Charname') is-invalid @enderror"  placeholder="Enter Charname">
                                    @error('Charname')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message  }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">WorldID</label>
                                    <input required type="number"   value="{{ old('WorldID' ?? '') }}"  name="WorldID" class="WorldID form-control  @error('WorldID') is-invalid @enderror"  placeholder="Enter WorldID">
                                    @error('WorldID')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
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

    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('.select2').select2()



            $('.Add-Warp').on('click' , function () {
                $('#modal-default').modal('show')
            })

            $('.Add-Hint').on('click' , function () {
                $('#modal-default2').modal('show')
            })




            $('#modal-default3').on('show.bs.modal', function(event) {


                 var button = $(event.relatedTarget)
                 let Edit_Button = document.getElementsByClassName('Edit-Warp');


                let data_warpID = button.data('warp_id')
                let data_warpKey = button.data('warp_key')
                let data_old_warpKey = button.data('warp_key')
                let data_event_name = button.data('event_name')
                let data_wregion_id = button.data('wregion_id')
                let data_posx = button.data('posx')
                let data_posy = button.data('posy')
                let data_posz = button.data('posz')
                let data_worldid = button.data('worldid')
                let data_service = button.data('service')


                 let modal = $(this)
                 modal.find('.modal-body .WarpKey').val(data_warpKey);
                 modal.find('.modal-body .oldWarpKey').val(data_warpKey);
                 modal.find('.modal-body .RegionID').val(data_wregion_id);
                 modal.find('.modal-body .PosX').val(data_posx);
                 modal.find('.modal-body .PosY').val(data_posy);
                 modal.find('.modal-body .PosZ').val(data_posz);
                 modal.find('.modal-body .WorldID').val(data_worldid);
                 modal.find('.modal-body .Service').val(data_service);


                 //'
                 modal.find('.form-route').attr('action' , `search-warps-hints/${data_warpID}`)









            })
        });






    </script>




@endpush

