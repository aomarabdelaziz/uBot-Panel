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
@section('title', 'uBot | Uniques Settings')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item"><a href="#">Events</a></li>
    <li class="breadcrumb-item"><a href="#">Uniques Events</a></li>
    <li class="breadcrumb-item active">Uniques</li>

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

                                    <form action="{{ route('panel.uniques.index') }}" method="GET">
                                        <div class="row">


                                            <div class="col-md-2">


                                                <div class="form-group">
                                                    <input type="number" class="form-control" value="{{ old('priority' , request()->input('priority') ) }}" name="priority" placeholder="priority">
                                                </div>
                                            </div>
                                            <div class="col-md-2">

                                                <div class="form-group">
                                                    <input type="number" class="form-control" value="{{ old('unique_id' , request()->input('unique_id')) }}" name="unique_id" placeholder="unique id">
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

                                <a class="Add-Warp btn btn-primary btn-sm" data-toggle="modal" href="#modal-default">
                                    <i class="fas fa-plus">
                                    </i>
                                    Add new Unique
                                </a>
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Uniques</h3>

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
                                                <th style="width: 10%" class="text-center">
                                                    #
                                                </th>
                                                <th style="width: 10%" class="text-center">
                                                    Priority
                                                </th>
                                                <th style="width: 10%" class="text-center">
                                                    UniqueID
                                                </th>
                                                <th style="width: 10%" class="text-center">
                                                    UniqueCount
                                                </th>
                                                <th style="width: 10%" class="text-center">
                                                    UniqueDelay
                                                </th>
                                                <th style="width: 10%" class="text-center">
                                                    Points
                                                </th>

                                                <th class="text-center">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_uniques as $index => $unique)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $index }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $unique->Priority }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $unique->UniqueID }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $unique->UniqueCount }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $unique->UniqueDelay }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $unique->Points }}
                                                    </td>



                                                    <td class="project-actions text-center">



                                                        <form class="d-inline-block" action="{{ route('panel.uniques.destroy' , $unique->id)}}" method="POST" >
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"  class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash">
                                                                </i>
                                                                Delete

                                                            </button>

                                                        </form>





                                                        <a  data-id="{{ $unique->id }}"
                                                            data-priority="{{ $unique->Priority }}"
                                                            data-unique_id="{{ $unique->UniqueID }}"
                                                            data-unique_count="{{ $unique->UniqueCount }}"
                                                            data-unique_delay="{{$unique->UniqueDelay}}"
                                                            data-points="{{$unique->Points}}"
                                                            data-toggle="modal"
                                                            class="Edit-Unique btn btn-warning btn-sm" href="#modal-default2">
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
                                            {{ $all_uniques->appends(request()->query())->links() }}
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
                            <h4 class="modal-title">Add New Unique</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('panel.uniques.store')}}" method="POST">
                            @csrf
                            <div class="modal-body">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Priority</label>
                                    <input required type="number" value="{{ old('Priority' ?? '') }}" name="Priority" class="form-control @error('Priority') is-invalid @enderror"  placeholder="Enter Priority">
                                    @error('Priority')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">UniqueID</label>
                                    <input required type="number" value="{{ old('UniqueID' ?? '') }}" name="UniqueID" class="form-control @error('UniqueID') is-invalid @enderror"  placeholder="Enter UniqueID">
                                    @error('UniqueID')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">UniqueCount</label>
                                    <input required type="number" value="{{ old('UniqueCount' ?? '') }}" name="UniqueCount" class="form-control @error('UniqueCount') is-invalid @enderror"  placeholder="Enter UniqueCount">
                                    @error('UniqueCount')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">UniqueDelay</label>
                                    <input required type="number" value="{{ old('UniqueDelay' ?? '') }}" name="UniqueDelay" class="form-control @error('UniqueDelay') is-invalid @enderror"  placeholder="Enter UniqueDelay">
                                    @error('UniqueDelay')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Points</label>
                                    <input required type="number" value="{{ old('Points' ?? '') }}" name="Points" class="form-control @error('Points') is-invalid @enderror"  placeholder="Enter Points">
                                    @error('Points')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
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
                            <h4 class="modal-title">Edit Unique</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-route" action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Priority</label>
                                    <input required type="number" value="{{ old('Priority' ?? '') }}" name="Priority" class="priority form-control @error('Priority') is-invalid @enderror"  placeholder="Enter Priority">
                                    @error('Priority')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">UniqueID</label>
                                    <input required type="number" value="{{ old('UniqueID' ?? '') }}" name="UniqueID" class="unique_id form-control @error('UniqueID') is-invalid @enderror"  placeholder="Enter UniqueID">
                                    @error('UniqueID')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">UniqueCount</label>
                                    <input required type="number" value="{{ old('UniqueCount' ?? '') }}" name="UniqueCount" class="unique_count form-control @error('UniqueCount') is-invalid @enderror"  placeholder="Enter UniqueCount">
                                    @error('UniqueCount')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">UniqueDelay</label>
                                    <input required type="number" value="{{ old('UniqueDelay' ?? '') }}" name="UniqueDelay" class="unique_delay form-control @error('UniqueDelay') is-invalid @enderror"  placeholder="Enter UniqueDelay">
                                    @error('UniqueDelay')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Points</label>
                                    <input required type="number" value="{{ old('Points' ?? '') }}" name="Points" class="points form-control @error('Points') is-invalid @enderror"  placeholder="Enter Points">
                                    @error('Points')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message  }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
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




            $('#modal-default2').on('show.bs.modal', function(event) {


                var button = $(event.relatedTarget)
                let Edit_Button = document.getElementsByClassName('Edit-Unique');



                let data_id = button.data('id')
                let data_priority = button.data('priority')
                let data_unique_id = button.data('unique_id')
                let data_unique_count = button.data('unique_count')
                let data_unique_delay = button.data('unique_delay')
                let data_points = button.data('points')


                let modal = $(this)
                modal.find('.modal-body .priority').val(data_priority);
                modal.find('.modal-body .unique_id').val(data_unique_id);
                modal.find('.modal-body .unique_count').val(data_unique_count);
                modal.find('.modal-body .unique_delay').val(data_unique_delay);
                modal.find('.modal-body .points').val(data_points);

                modal.find('.form-route').attr('action' , `uniques/${data_id}`)









            })
        });






    </script>




@endpush

