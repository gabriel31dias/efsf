
    @extends('layouts.app')

    @section('content')
    <livewire:users.user-form :action="'update'" :user="$user"/>
    @endsection

