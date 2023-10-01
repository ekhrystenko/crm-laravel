@extends('layouts.admin.layout')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h3 class="navbar-brand">Clients</h3>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a href="{{ route('clients.create') }}" class="btn btn-outline-success my-2 my-sm-0" type="submit">Create
                    new client</a>
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
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <th scope="row">{{ $client->id }}</th>
                <td><a href="{{ route('clients.show', $client->id) }}">{{ $client->name }}</a></td>
                <td>{{ $client->surname }}</td>
                <td>{{ $client->email }}</td>
                <td><a class="btn btn-warning" href="{{ route('clients.edit', $client->id) }}">Edit</a></td>
                <td>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
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
        {{ $clients->links() }}
    </div>
@endsection
