
    @extends('layouts.app')

    @section('content')
        <livewire:feature.feature-form :action="'update'" :feature="$feature" />
    @endsection
