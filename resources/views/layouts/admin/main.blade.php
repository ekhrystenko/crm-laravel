@extends('layouts.admin.layout')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $companiesCount }}</h3>
                    <p>Companies</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('companies.index') }}" class="small-box-footer">More <i
                            class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $clientsCount }}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('clients.index') }}" class="small-box-footer">More <i
                            class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
