
    @extends('layouts.app')

    @section('content')
        <livewire:unity.unity-form :action="'update'" :uf="$uf" />
    @endsection
