
    @extends('layouts.app')

    @section('content')
        <livewire:director-signature.director-signature-form :action="'update'" :directorSign="$directorSign"  />
    @endsection
