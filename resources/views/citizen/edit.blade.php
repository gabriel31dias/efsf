
@extends('layouts.app')

@section('content')

    <livewire:citizen.citizen-index :action="'update'" :citizen="$citizen" />
@endsection

