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
@section('title', 'uBot | Top Rewards')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item"><a href="#">Rewards</a></li>
    <li class="breadcrumb-item active">Top Rewards</li>

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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">

                                    <form action="{{ route('panel.top-rewards.index') }}" method="GET">
                                        <div class="row">


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <select class="select2 event-name"  name="event_name" data-placeholder="Any" style="width: 100%;">
                                                        <option selected disabled>Select event</option>
                                                        @foreach($EVENTS as $event)
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
                                        Add Reward
                                    </a>
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h3 class="card-title">Top Rewards</h3>

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
                                                        Top Winner
                                                    </th>
                                                    <th style="width: 10%"  class="text-center">
                                                        RewardType
                                                    </th>
                                                    <th  class="text-center">
                                                        Reward Control
                                                    <th  class="text-center">
                                                        SilkType
                                                    </th>
                                                    <th  class="text-center">
                                                        SilkAmount
                                                    </th>
                                                    <th  class="text-center">
                                                        GoldAmount
                                                    </th>
                                                    <th s class="text-center">
                                                        ItemCodeName128
                                                    </th>
                                                    <th  class="text-center">
                                                        ItemPlus
                                                    </th>
                                                    <th  class="text-center">
                                                        ItemAmount
                                                    </th>
                                                    <th class="text-center">
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $index => $eventReward)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $eventReward->TopWinner }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $eventReward->RewardType }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $eventReward->RewardControl }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $eventReward->SilkType }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $eventReward->SilkAmount }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $eventReward->GoldAmount }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $eventReward->ItemCodeName128 }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $eventReward->ItemPlus }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $eventReward->ItemAmount }}
                                                        </td>
                                                        <td class="project-actions text-center">



                                                            <form class="d-inline-block" action="{{ route('panel.top-rewards.destroy' , $eventReward->EventKey)}}" method="POST" >
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"  class="btn btn-danger  btn-sm">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Delete

                                                                </button>

                                                            </form>





                                                        <!--                                                            <a  data-event_key="{{ $eventReward->EventKey }}"
                                                                data-id="{{ $eventReward->id }}"
                                                                data-reward_type="{{ $eventReward->RewardType }}"
                                                                data-reward_control="{{$eventReward->RewardControl}}"
                                                                data-silk_type="{{$eventReward->SilkType}}"
                                                                data-silk_amount="{{$eventReward->SilkAmount}}"
                                                                data-gold_amount="{{$eventReward->GoldAmount}}"
                                                                data-item_code="{{$eventReward->ItemCodeName128}}"
                                                                data-item_plus="{{$eventReward->ItemPlus}}"
                                                                data-item_amount="{{$eventReward->ItemAmount}}"
                                                                data-toggle="modal"
                                                                class="Edit-Warp btn btn-warning btn-sm" href="#modal-default3">
                                                                <i class=" fas fa-edit">
                                                                </i>
                                                                Edit
                                                            </a>-->


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
                        <h4 class="modal-title">Add new Reward</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-route" action="{{ route('panel.top-rewards.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">

                            <input type="hidden" value="{{$eventName}}" name="event">
                            <div class="form-group">
                                <label for="exampleInputText">Reward Type</label>

                                <select class="form-control" name="RewardType">
                                    <option value="1"> Silk </option>
                                    <option value="2"> Gold </option>
                                    <option value="3"> Item </option>
                                    <option value="4"> All\Other </option>
                                </select>
                                @error('RewardType')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message  }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputText">Reward Control</label>

                                <select class="form-control" name="RewardControl">
                                    <option value="1"> Inventory </option>
                                    <option value="2"> Storage </option>
                                </select>
                                @error('RewardControl')
                                <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message  }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputText">Silk Type</label>

                                <select class="form-control" name="SilkType">
                                    <option value="1"> silk_own </option>
                                    <option value="2"> silk_gift </option>
                                    <option value="3"> silk_point </option>
                                </select>
                                @error('SilkType')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message  }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Silk Amount</label>
                                <input type="number" class="form-control @error('SilkAmount') is-invalid @enderror" name="SilkAmount" value="{{ old('SilkAmount' , '0') }}" placeholder="1">
                                @error('SilkAmount')
                                <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Gold Amount</label>
                                <input type="number" class="form-control @error('GoldAmount') is-invalid @enderror" name="GoldAmount" value="{{ old('GoldAmount' , '0') }}" placeholder="1">
                                @error('GoldAmount')
                                <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">ItemCodeName</label>
                                <input type="text" class="form-control @error('ItemCodeName128') is-invalid @enderror" name="ItemCodeName128" value="{{ old('ItemCodeName128' , 'DUMMY') }}" placeholder="1">
                                @error('ItemCodeName128')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Item Plus</label>
                                <input type="number" class="form-control @error('ItemPlus') is-invalid @enderror" name="ItemPlus" value="{{ old('ItemPlus' , '0') }}" placeholder="1">
                                @error('ItemPlus')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Item Amount</label>
                                <input type="number" class="form-control @error('ItemAmount') is-invalid @enderror" name="ItemAmount" value="{{ old('ItemAmount' , '0') }}" placeholder="1">
                                @error('ItemAmount')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
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

            $('#modal-default3').on('show.bs.modal', function(event) {


                var button = $(event.relatedTarget)
                let Edit_Button = document.getElementsByClassName('Edit-Reward');


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

