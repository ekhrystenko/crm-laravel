@extends('layouts.admin.layout')
@section('content')
    <div class="m-lg-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h3 class="navbar-brand">Company</h3>
        </nav>
        <div class="card mb-5" >
            <h5 class="card-header">{{ $company->name }}</h5>
            <div class="card-body">
                <h5 class="card-title">{{ $company->email }}</h5>
                <p class="card-text pt-3">{{ $company->description }}</p>
                <p class="card-text"><small class="text-muted">{{ $company->foundation_year->format('d.m.Y') }}</small></p>
                <a href="{{ route('companies.index') }}" class="btn btn-outline-info">Back</a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h3 class="navbar-brand">Clients</h3>
        </nav>
        <div class="row">
            @forelse($company->clients as $client)
            <div class="col-sm-4 mt-3">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">{{ $client->name }} {{ $client->surname }}</h5>
                        <p class="card-text">{{ $client->email }}</p>
                    </div>

                </div>
            </div>
            @empty
                <p class="ml-3 mt-2">No customers...</p>
            @endforelse
        </div>
    </div>
@endsection
