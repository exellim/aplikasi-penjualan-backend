@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h5>Customer List</h5>
                        <br>
                        <div>
                            <h1>{{ $model->nama }}</h1>
                            <h2>{{ $model->alamat_rumah }}</h2>
                            <h2>{{ $model->handphone }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
