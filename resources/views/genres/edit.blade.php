
    @extends('layouts.app')

    @section('content')
    <livewire:genres.genres-form :action="'update'" :genres="$genre" />
    @endsection

