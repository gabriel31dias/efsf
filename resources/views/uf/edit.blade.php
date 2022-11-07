
    @extends('layouts.app')

    @section('content')
        <livewire:uf.uf-form :action="'update'" :uf="$uf" />
    @endsection
