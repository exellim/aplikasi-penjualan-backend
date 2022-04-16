@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Welcome {{ Auth::user()->name }}</h4>
                    <div class="table-responsive">
                        <h5>Nota List</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Nota Id </th>
                                    <th> Nama </th>
                                    <th> Jumlah Produk </th>
                                    <th> Pembuatan </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nota as $nota)
                                    <tr>
                                        <td>
                                            {{ $nota->notaId }}
                                        </td>
                                        <td> {{ $nota->nama }} </td>
                                        <td>
                                            {{ count(explode(',', $nota->nama_produk)) }}
                                        </td>
                                        <td> {{ $nota->created_at }}</td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h5>Customer List</h5>
                        <table class="table table-striped">
                            <thead style="text-align: center">
                                <tr>
                                    <th> No </th>
                                    <th> Nama </th>
                                    <th> Alamat </th>
                                    <th> No.Telf </th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @foreach ($customer as $cust)
                                    <tr>
                                        <td>
                                            {{-- {{ $cust->notaId }} --}}
                                            {{ $loop->iteration }}
                                        </td>
                                        <td> {{ $cust->nama }} </td>
                                        <td>
                                            {{ $cust->alamat_rumah }}
                                        </td>
                                        <td>
                                            {{ $cust->handphone }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
