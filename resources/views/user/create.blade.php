@extends('layouts.app')
@section('content')
    <livewire:users.user-form  :action="'create'" />
@endsection
