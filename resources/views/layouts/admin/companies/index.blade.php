@extends('layouts.admin.layout')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h3 class="navbar-brand">Companies</h3>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a href="{{ route('companies.create') }}" class="btn btn-outline-success my-2 my-sm-0" type="submit">Create
                    new company</a>
            </div>
        </div>
    </nav>
    <div>
        @include('layouts.admin.includes.messages')
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Description</th>
            <th scope="col">Foundation Year</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <th scope="row">{{ $company->id }}</th>
                <td><a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a></td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->description }}</td>
                <td>{{ $company->foundation_year->format('d.m.Y') }}</td>
                <td><a class="btn btn-warning" href="{{ route('companies.edit', $company->id) }}">Edit</a></td>
                <td>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $companies->links() }}
    </div>
@endsection
