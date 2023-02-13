@extends('layouts.app')
@section('content')
    <livewire:process.process-monitor  :action="'update'" :process="$process"  />
@endsection
