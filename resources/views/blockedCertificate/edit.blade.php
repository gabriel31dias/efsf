
    @extends('layouts.app')

    @section('content')
        <livewire:blocked-certificate.blocked-certificate-form :action="'update'" :blockedCertificate="$blockedCertificate" />
    @endsection
