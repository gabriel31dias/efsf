
    @extends('layouts.app')

    @section('content')
        <livewire:county.county-form :action="'update'" :county="$county" />
    @endsection
