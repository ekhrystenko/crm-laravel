@extends('layouts.admin.layout')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h3 class="navbar-brand">Edit Company</h3>
    </nav>
    <form method="POST" action="{{ route('companies.update', $company->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                   placeholder="Name" value="{{ $company->name }}">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                   placeholder="Email" value="{{ $company->email }}">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="foundation_year">Foundation Year</label>
            <input type="date" class="form-control @error('foundation_year') is-invalid @enderror" id="foundation_year"
                   name="foundation_year" placeholder="Year" value="{{ $company->foundation_year->format('Y-m-d') }}">
            @error('foundation_year')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                      name="description">{{ $company->description }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-success mb-3 w-25">Update</button>
    </form>
@endsection
