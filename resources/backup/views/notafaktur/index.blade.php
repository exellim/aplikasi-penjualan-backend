@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h5>Daftar Nota</h5>
                        <br>
                        <div class="card-description">
                            <div style="align-items: flex-end">
                                <a href="{{ route('nota.create') }}"><button type="button"
                                        class="btn btn-success btn-rounded btn-fw">+ Buat
                                        Rencana Kunjungan</button></a>
                            </div>
                        </div>
                        <br>

                        <table class="table table-hover" style="width: 100%;">
                            <thead style="text-align: flex;flex:1;">
                                <tr>
                                    <th> No </th>
                                    <th> Id </th>
                                    <th> Nama </th>
                                    <th> No Telfon </th>
                                    <th> Produk </th>
                                    <th> Total </th>
                                    <th> Status </th>
                                    <th colspan="2" style="text-align: center;"> Aksi </th>
                                </tr>
                            </thead>
                            <tbody style="text-align: flex;">
                                @foreach ($nota as $nota)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td> {{ $nota->notaId }} </td>
                                        <td> {{ $nota->nama }} </td>
                                        <td>
                                            {{ $nota->nomor_telfon }}
                                        </td>
                                        <td>
                                            {{ str_replace('[', '', str_replace(']', '', str_replace('\'', '', $nota->nama_produk))) }}
                                        </td>
                                        <td>
                                            {{ $nota->subtotal_harga }}
                                        </td>
                                        <td>
                                            @if ($nota->status == 'pending')
                                                <div class="badge badge-outline-warning">Pending</div>
                                            @elseif ($nota->status == 'rejected')
                                                <div class="badge badge-outline-danger">Rejected</div>
                                            @elseif ($nota->status == 'approved')
                                                <div class="badge badge-outline-success">Approved</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('nota/' . $nota->id . '/edit') }}" class="btn btn-info"><i
                                                    class="mdi mdi-lead-pencil"></i>Update</a>
                                        </td>

                                        <td>
                                            <form action="{{ url('nota/' . $nota->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger"><i
                                                        class="mdi mdi-delete-forever"></i>Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                        {!! $nota->links('pagination::bootstrap-4') !!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
