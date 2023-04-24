@extends('layouts.app')
@section('content')
    <livewire:ballots.ballots-form :action="'update'" :ballots="$ballots" />
@endsection

