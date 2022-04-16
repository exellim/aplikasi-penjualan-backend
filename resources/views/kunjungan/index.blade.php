@extends('layouts.app')

@section('content')
    <h1>Kunjungan</h1>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h5>Daftar Kunjungan</h5>
                        <br>
                        <div class="card-description">
                            <div style="align-items: flex-end">
                                <a href="{{ route('kunjungan.create') }}"><button type="button"
                                        class="btn btn-success btn-rounded btn-fw">+ Buat
                                        Rencana Kunjungan</button></a>
                            </div>
                        </div>
                        <br>

                        <table class="table table-hover" style="width: 100%;">
                            <thead style="text-align: flex;flex:1;">
                                <tr>
                                    <th> No </th>
                                    <th> Nama </th>
                                    <th> Kode Pegawai </th>
                                    <th> Tanggal </th>
                                    <th> Jam Kunjungan </th>
                                    <th> Tujuan </th>
                                    <th colspan="2" style="text-align: center;"> Aksi </th>
                                </tr>
                            </thead>
                            <tbody style="text-align: flex;">
                                @foreach ($kunjungan as $plan)
                                    <tr>
                                        <td>
                                            {{-- {{ $plan->notaId }} --}}
                                            {{ $loop->iteration }}
                                        </td>
                                        <td> {{ $plan->nama }} </td>
                                        <td> {{ $plan->emp_number }} </td>
                                        <td>
                                            {{ $plan->tanggal_tujuan }}
                                        </td>
                                        <td>
                                            {{-- {{ $plan->jam_mulai }} --}}
                                            {{ str_replace(')', '', str_replace('(', '', str_replace('TimeOfDay', '', $plan->jam_mulai))) }}
                                        </td>
                                        <td>
                                            @if ($plan->kunjungan_value == 'Ya' || $plan->tujuan_value == 'Tidak')
                                                Ambil Order
                                            @elseif ($plan->tujuan_value == 'Ya' || $plan->kunjungan_value == 'Tidak')
                                                Penagihan
                                            @elseif ($plan->tujuan_value == 'Ya' || $plan->kunjungan_value == 'Ya')
                                                Ambil Order dan Penagihan
                                            @elseif ($plan->tujuan_value == 'Tidak' || $plan->kunjungan_value == 'Tidak')
                                                Tidak Ada Keterangan
                                            @endif

                                        </td>
                                        <td>
                                            {{-- <button type="button" class="btn btn-primary btn-rounded btn-fw"><i
                                                    class="mdi mdi-delete-forever"></i></button> --}}
                                            <a href="{{ url('kunjungan/' . $plan->id . '/edit') }}"
                                                class="btn btn-info"><i class="mdi mdi-lead-pencil"></i>Update</a>
                                        </td>

                                        <td>
                                            <form action="{{ url('kunjungan/' . $plan->id) }}" method="POST">
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
                    <div class="d-flex justify-content-center">
                        {!! $kunjungan->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
