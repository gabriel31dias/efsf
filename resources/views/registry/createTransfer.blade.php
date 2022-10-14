
    @extends('layouts.app')

    @section('content')
        <livewire:registry.registry-transfer-form :action="'create'" />
    @endsection
