<table class="table table-hover" style="width: 100%;" id="dataTableCustomer">
    <thead style="text-align: flex;flex:1;">
        <tr>
            <th> No </th>
            <th> Nama </th>
            <th> Alamat </th>
            <th> No.Telf </th>
            <th colspan="2" style="text-align: center;"> Aksi </th>
        </tr>
    </thead>
    <tbody style="text-align: flex;">
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
                <td>
                    {{-- <button type="button" class="btn btn-primary btn-rounded btn-fw"><i
                            class="mdi mdi-delete-forever"></i></button> --}}
                    <a href="{{ url('customer/' . $cust->id) }}" class="btn btn-primary"><i
                            class="mdi mdi-account-card-details"></i>Details</a>
                    <a href="{{ url('customer/' . $cust->id . '/edit') }}" class="btn btn-info"><i
                            class="mdi mdi-lead-pencil"></i>Update</a>
                </td>
                <td>
                    <form action="{{ url('customer/' . $cust->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger"><i class="mdi mdi-delete-forever"></i>Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
