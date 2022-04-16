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
                        <form action="{{ route('customer.index') }}" method="get" id="formSearch">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Customer" name="search"
                                    id="inputSearch" value="{{ old('search') }}" style="color: #ffffff">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="card-description">
                            <div style="align-items: flex-end">
                                <a href="{{ route('customer.create') }}"><button type="button"
                                        class="btn btn-success btn-rounded btn-fw">+ Add
                                        Customer</button></a>
                            </div>
                        </div>
                        <br>
                        <div id="bodyTableListCustomer">
                            @include('customer.datatable-list-customer')
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $customer->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function() {
            $('#inputSearch').on('change', function() {
                $('#formSearch').ajaxSubmit({
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    },
                    success: function(data, status, jqxhr) {
                        let bodyTableCustomer = $('body #bodyTableListCustomer')
                        // let dataTableCustomer = bodyTableCustomer.find('#dataTableCustomer')
                        console.log($('#formSearch').find('input[name="search"]').val())
                        // dataTableCustomer.remove()
                        bodyTableCustomer.empty().append(data)
                        // $('#bodyDashboard').empty().append(data)
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
