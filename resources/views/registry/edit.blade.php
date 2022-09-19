
    @extends('layouts.app')

    @section('content')
        <livewire:registry.registry-form :action="'update'" :registry="$registry" />
    @endsection
