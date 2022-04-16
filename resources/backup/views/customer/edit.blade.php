@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ url('customer/' . $model->id) }}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Customer</h4>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="nama">Name</label>
                                <input type="text" class="form-control" id="nama" placeholder="nama" name="nama"
                                    style="color: #ffffff" value="{{ $model->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat_rumah">Alamat</label>
                                <input type="text" class="form-control" id="alamat_rumah" placeholder="alamat rumah"
                                    name="alamat_rumah" style="color: #ffffff" value="{{ $model->alamat_rumah }}">
                            </div>
                            <div class="form-group">
                                <label for="handphone">Handphone</label>
                                <input type="text" class="form-control" id="handphone" placeholder="handphone"
                                    name="handphone" style="color: #ffffff" value="{{ $model->handphone }}">
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
