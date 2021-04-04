@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <a href="{{ route('make.payment') }}" class="btn btn-primary mt-3">Pay $224 via Paypal</a>

                        {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
