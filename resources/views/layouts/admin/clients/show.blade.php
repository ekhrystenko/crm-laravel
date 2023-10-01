@extends('layouts.admin.layout')
@section('content')
    <div class="m-lg-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h3 class="navbar-brand">Client</h3>
        </nav>
        <div class="card mb-5" >
            <h5 class="card-header">{{ $client->name }} {{ $client->surname }}</h5>
            <div class="card-body">
                <h5 class="card-title">{{ $client->email }}</h5>
                <p class="card-text pt-3"></p>
                <a href="{{ route('clients.index') }}" class="btn btn-outline-info">Back</a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h3 class="navbar-brand">Companies</h3>
        </nav>
        <div class="row">
            @forelse($client->companies as $company)
                <div class="col-sm-4 mt-3">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">{{ $company->name }}</h5>
                            <p class="card-text">{{ $company->email }}</p>
                            <p class="card-text pt-3">{{ $company->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $company->foundation_year->format('d.m.Y') }}</small></p>
                        </div>

                    </div>
                </div>
            @empty
                <p class="ml-3 mt-2">No companies...</p>
            @endforelse
        </div>
    </div>
@endsection
