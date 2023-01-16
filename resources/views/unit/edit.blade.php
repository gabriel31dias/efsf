
    @extends('layouts.app')

    @section('content')
        <livewire:unity.unity-form :action="'update'" :unit="$unit"  />
    @endsection
