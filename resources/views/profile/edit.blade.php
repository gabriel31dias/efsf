@extends('layouts.app')
@section('content')
    <livewire:profiles.profile-form :action="'update'" :profile="$profile" />
@endsection
