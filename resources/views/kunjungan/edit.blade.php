@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ url('kunjungan/' . $model->id) }}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Buat Rencana Kunjungan</h4>
                        <form class="forms-sample">
                            <input type="hidden" value="{{ $model->emp_number }}" id="emp_number" name="emp_number">
                            <div class="form-group">
                                <label>Pilih Nama Customer</label>
                                <select class="js-example-basic-single select2-hidden-accessible" style="width:100%"
                                    aria-hidden="true" name="nama" id="nama">
                                    @foreach ($customer as $customer)
                                        <option value="{{ $customer->nama }}">
                                            {{ $model->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_tujuan">Tanggal Tujuan</label>
                                <input type="text" class="form-control" id="tanggal_tujuan"
                                    value="{{ $model->tanggal_tujuan }}" placeholder="Tahun-Bulan-Tanggal"
                                    name="tanggal_tujuan" style="color: #ffffff">
                            </div>

                            @if ($model->kunjungan_value == 'Ya')
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Ambil Order</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="kunjungan_value"
                                                        id="kunjungan_value" value="Ya" checked=""> Ya <i
                                                        class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="kunjungan_value"
                                                        id="kunjungan_value" value="Tidak"> Tidak <i
                                                        class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Ambil Order</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="kunjungan_value"
                                                        id="kunjungan_value" value="Ya"> Ya <i
                                                        class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="kunjungan_value"
                                                        id="kunjungan_value" value="Tidak" checked=""> Tidak <i
                                                        class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($model->tujuan_value == 'Ya')
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Penagihan</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="tujuan_value"
                                                        id="tujuan_value" value="Ya" checked=""> Ya <i
                                                        class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="tujuan_value"
                                                        id="tujuan_value" value="Tidak"> Tidak <i
                                                        class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Penagihan</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="tujuan_value"
                                                        id="tujuan_value" value="Ya"> Ya <i
                                                        class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="tujuan_value"
                                                        id="tujuan_value" value="Tidak" checked=""> Tidak <i
                                                        class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jam</label>
                                    <div class="col-sm-4">
                                        <label class="col-sm-6 col-form-label">Mulai</label>
                                        <div class="form-check">
                                            <input type="text" class="form-control" id="jam_mulai" name="jam_mulai"
                                                value="{{ $model->jam_mulai }}" style="color: #ffffff">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="col-sm-6 col-form-label">Selesai</label>
                                        <div class="form-check">
                                            <input type="text" class="form-control" id="jam_selesai" name="jam_selesai"
                                                value="{{ $model->jam_selesai }}" style="color: #ffffff">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea1">Catatan</label>
                                <textarea class="form-control" id="catatan" style="color: #ffffff" name="catatan"
                                    placeholder="Catatan" rows="4">{{ $model->catatan }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
