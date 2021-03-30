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
@section('title', 'uBot | Warps')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item active">Rewards</li>

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

                                <form action="{{ route('panel.rewards.index') }}" method="GET">
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


                                @if($eventName)
                                    <div class="card card-primary">
                                        <div class="card-header ">
                                            <h3 class="card-title ">Rewards Settings</h3>
                                        </div>

                                        <form action="{{ route('panel.rewards.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">

                                                <input type="hidden" value="{{$eventName}}" name="event">



                                                <div class="form-group">
                                                    <label for="exampleInputText">Reward Type</label>

                                                    <select class="form-control" name="RewardType">
                                                        <option value="1" {{ ( $data->RewardType == 1) ? 'selected' : '' }}> Silk </option>
                                                        <option value="2" {{ ( $data->RewardType == 2) ? 'selected' : '' }}> Gold </option>
                                                        <option value="3" {{ ( $data->RewardType == 3) ? 'selected' : '' }}> Item </option>
                                                        <option value="4" {{ ( $data->RewardType == 4) ? 'selected' : '' }}> All/Other </option>

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
                                                        <option value="1" {{ ( $data->RewardControl == 1) ? 'selected' : '' }}> Inventory </option>
                                                        <option value="2" {{ ( $data->RewardControl == 2) ? 'selected' : '' }}> Storage </option>
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
                                                        <option value="1" {{ ( $data->SilkType == 1) ? 'selected' : '' }}> silk_own </option>
                                                        <option value="2" {{ ( $data->SilkType == 2) ? 'selected' : '' }}> silk_gift </option>
                                                        <option value="3" {{ ( $data->SilkType == 3) ? 'selected' : '' }}> silk_point </option>
                                                    </select>
                                                    @error('SilkType')
                                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message  }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>



                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Silk Amount</label>
                                                    <input type="number" class="form-control @error('SilkAmount') is-invalid @enderror" name="SilkAmount" value="{{ old('SilkAmount' , $data->SilkAmount) }}" placeholder="1">
                                                    @error('SilkAmount')
                                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Gold Amount</label>
                                                    <input type="number" class="form-control @error('GoldAmount') is-invalid @enderror" name="GoldAmount" value="{{ old('GoldAmount' , $data->GoldAmount) }}" placeholder="1">
                                                    @error('GoldAmount')
                                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">ItemCodeName</label>
                                                    <input type="text" class="form-control @error('ItemCodeName128') is-invalid @enderror" name="ItemCodeName128" value="{{ old('ItemCodeName128' , $data->ItemCodeName128) }}" placeholder="1">
                                                    @error('ItemCodeName128')
                                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Item Plus</label>
                                                    <input type="number" class="form-control @error('ItemPlus') is-invalid @enderror" name="ItemPlus" value="{{ old('ItemPlus' , $data->ItemPlus) }}" placeholder="1">
                                                    @error('ItemPlus')
                                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Item Amount</label>
                                                    <input type="number" class="form-control @error('ItemAmount') is-invalid @enderror" name="ItemAmount" value="{{ old('ItemAmount' , $data->ItemAmount) }}" placeholder="1">
                                                    @error('ItemAmount')
                                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>



                                            </div>


                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </form>


                                    </div>



                                @endif
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

