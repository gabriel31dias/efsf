
    @extends('layouts.app')

    @section('content')
        <livewire:service-station.service-station-form :action="'update'" :serviceStation="$serviceStation" />
    @endsection
