
    @extends('layouts.app')

    @section('content')
        <livewire:registry.registry-interdiction-form :action="'update'" :registryInterdiction="$registryInterdiction" />
    @endsection
