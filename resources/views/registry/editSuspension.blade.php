
    @extends('layouts.app')

    @section('content')
        <livewire:registry.registry-suspension-form :action="'update'" :registrySuspension="$registrySuspension" />
    @endsection
