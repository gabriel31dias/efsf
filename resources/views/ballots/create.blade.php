@extends('layouts.app')
@section('content')
    <livewire:ballots.ballots-form :action="'create'" />
@endsection
