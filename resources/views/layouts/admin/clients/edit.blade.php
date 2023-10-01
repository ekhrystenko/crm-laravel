@extends('layouts.admin.layout')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h3 class="navbar-brand">Edit Client</h3>
    </nav>
    <form method="POST" action="{{ route('clients.update', $client->id) }}">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ $client->name }}">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" placeholder="Surname" value="{{ $client->surname }}">
            @error('surname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $client->email }}">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="clients">Companies</label>
            <select class="form-select form-control form-select-lg mb-3" name="companies[]" multiple style="height: 350px;">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ in_array($company->id, $selectedCompanies) ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-outline-success mb-3 w-25">Update</button>
    </form>

@endsection

