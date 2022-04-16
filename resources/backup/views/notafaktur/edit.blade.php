@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ url('nota/' . $model->id) }}">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Buat Nota Faktur</h4>
                        <form class="forms-sample">
                            <div class="row">
                                <input type="hidden" value="{{ Auth::user()->emp_number }}" id="notaId" name="notaId">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pilih Nama Customer</label>
                                        <select class="js-example-basic-single form-control" style="width:100%"
                                            aria-hidden="true" name="nama" id="nama_customer">
                                            @foreach ($customer as $customer)
                                                <option value="{{ $customer->nama }}" {{ $model->nama ==  $customer->nama  ? 'selected' : '' }} data-key="{{ $customer->id }}">
                                                    {{ $customer->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nomor_telfon">Nomor Telfon</label>
                                        <input readonly type="text" class="form-control" id="nomor_telfon"
                                            placeholder="nomor telfon" name="nomor_telfon"
                                            value="{{ $model->nomor_telfon }}"
                                            style="color: #ffffff; background-color:black">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status Pembayaran</label>
                                        <select class="js-example-basic-single form-control" style="width:100%; color:#ffffff"
                                            aria-hidden="true" name="status" id="status">
                                                <option value="pending" {{ $model->status == 'pending' ? 'selected' : '' }} style="color:#ffffff">
                                                    Pending</option>
                                                <option value="approved" {{ $model->status == 'approved' ? 'selected' : '' }} style="color:#ffffff">
                                                        Approved</option>
                                                <option value="rejected" {{ $model->status == 'rejected' ? 'selected' : '' }} style="color:#ffffff">
                                                            Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- nama_produk, qty_produk, harga_produk, subtotal_harga --}}
                                <div class="col-md-12">
                                    <div id="parentRow">
                                        @foreach ($model->nama_produk as $key => $item)
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="nama_produk[]">Nama Produk</label>
                                                <input type="text" name="nama_produk[]" id="nama_produk[]"
                                                    class="form-control" style="color: #ffffff" value="{{ $model->nama_produk[$key] }}">
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label for="qty_produk[]">Quantity</label>
                                                <input type="text" name="qty_produk[]" id="qty_produk[]"
                                                    class="form-control" style="color: #ffffff" value="{{ $model->qty_produk[$key] }}">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="harga_produk[]">Harga</label>
                                                <input type="text" name="harga_produk[]" id="harga_produk[]"
                                                    class="form-control" style="color: #ffffff" value="{{ $model->harga_produk[$key] }}">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="subtotal_harga[]">Sub Total</label>
                                                <input readonly type="text" name="subtotal_harga[]" id="subtotal_harga[]"
                                                    class="form-control" style="color: #ffffff" value="{{ $model->subtotal_harga[$key] }}">
                                            </div>
                                            <div class="col-md-1 align-center">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-success btn-sm btnAddRow"><i
                                                                class="mdi mdi-cart-plus"></i></button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-success btn-sm btnDeleteRow"
                                                            style="display:none"><i class="mdi mdi-delete"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-left:auto; margin-right:0">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Total:</label>

                                    </div>
                                    <div class="col-md-7">
                                        <label for="total" class="form-control"></label>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a class="btn btn-dark" href="{{ url('nota') }}">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        var rowlength = 1;
        $(function() {
            $(document).ready(function(){
                rowlength = $('body #parentRow').find('input[name="subtotal_harga[]').length
                $('body input[name="subtotal_harga[]').trigger('change')
            })
            $('body').on('change', 'input[name="qty_produk[]"]', function() {
                let parentRow = $(this).closest('.row')
                let qty_produk = parentRow.find('input[name="qty_produk[]"]').val()
                if (qty_produk == '' || qty_produk == null) {
                    console.log("qty kosong")
                }
            })
            $('body').on('change', 'input[name="harga_produk[]"]', function() {
                let parentRow = $(this).closest('.row')
                let harga = parentRow.find('input[name="harga_produk[]"]').val()
                let subtotal_harga = parentRow.find('input[name="subtotal_harga[]"]')
                let qty_produk = parentRow.find('input[name="qty_produk[]"]').val()
                if (harga == '' || harga == null) {
                    console.log("harga kosong")
                }
                if (qty_produk == '' || qty_produk == null) {
                    console.log("qty kosong")
                }
                subtotal_harga.val(harga * qty_produk).trigger('change')
            })
            $('body').on('change', 'input[name="subtotal_harga[]"]', function() {
                // let subtotal_harga = ('body #parentRow>.col-md-12>.row')
                let parentRow = $(this).closest('#parentRow');
                let subtotal_harga = 0;
                for (let i = 1; i <= rowlength; i++) {
                    subtotal_harga += parseInt(parentRow.find('.row:nth-child(' + i +
                        ') input[name="subtotal_harga[]"]').val());
                }
                $('label[for="total"]').text(subtotal_harga)
            })

            $('.select2-multiple').select2({
                tags: true,
                tokenSeparators: [',']
            })
            $('.btnAddRow').on('click', function() {
                rowlength += 1
                let parent = $('#parentRow')
                let col = parent.find('.row:nth-child(1)')
                let row = '<div class="row">' + col.clone().html() + '</div>'
                parent.append(row)
                let added = $('#parentRow').find('.row:last')
                added.find('.btnDeleteRow').css({
                    'display': 'block'
                })
            })
            $('body').on('click', '.btnDeleteRow', function() {
                rowlength -= 1
                let parent = $('#parentRow>.row:last').remove()
                // let col = parent.find('.row:last').remove()
            })
            $('#nama_customer').on('change', function() {
                let baseURL = $('meta[name="baseURL"]').attr('content')
                let id = $('#nama_customer option:selected, this').data('key');
                let url = baseURL + '/nota/' + id
                $.ajax({
                    url: url,
                    type: 'GET',
                    error: function(jqXHR, text) {
                        console.log(text)
                    },
                    success: function(data, status, jqxhr) {
                        $('#nomor_telfon').val(data.handphone);
                    }
                })
            })
            $('#formSearch').on('submit', function(e) {
                e.preventDefault();
                // $(this).ajaxSubmit({
                //     error: function(xhr) {
                //         console.log(xhr.responseText);
                //     },
                //     success: function(data, status, jqxhr) {
                //         let bodyTableCustomer = $('body #bodyTableListCustomer')
                //         // let dataTableCustomer = bodyTableCustomer.find('#dataTableCustomer')
                //         console.log($('#formSearch').find('input[name="search"]').val())
                //         // dataTableCustomer.remove()
                //         bodyTableCustomer.empty().append(data)
                //         // $('#bodyDashboard').empty().append(data)
                //     }
                // })
            })
        })
    </script>
@endpush
