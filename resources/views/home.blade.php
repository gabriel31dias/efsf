@extends('layouts.app')

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
                    @if (session('updatePass'))
                    xxx
                    <div class="alert alert-warning">{{ session('updatePass') }}</div>
                    @endif
                    wddwwd
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        if("{{session('updatePass')}}" == "true"){
            passwordExpiredChangModal(1)
        }
    </script>
</div>
@endsection
