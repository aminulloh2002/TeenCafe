@extends('user.template')
@section('title','Detail History')
@section('content')
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-8 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <h4>Detail Pemesan</h4>
                    <br>
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">No</th>
                                <th class="column-2">Nama</th>
                                <th class="column-3">Total</th>
                                <th class="column-4">Status</th>
                                <th class="column-5"></th>
                            </tr>

                            
                            @foreach ($pemesan as $psn)
                                
                            <tr  class="table_row">
                                <td class="column-1">
                                    {{$loop->iteration}}
                                </td>
                                <td class="column-2">{{ $psn->name_customer}}</td>
                                <td class="column-3">{{ $psn->total_price}}</td>
                                <td class="column-4">{{ $psn->status_order}}</td>
                                <td class="column-5"></td>
                            </tr>
                            @endforeach
                            
                            
                            
                        </table>
                    </div>
                    <br>
                    <h4>Detail Pesanan</h4>
                    <br>
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">No</th>
                                <th class="column-2">Nama Product</th>
                                <th class="column-3">Jumlah</th>
                                <th class="column-4"></th>
                            </tr>

                            
                            @foreach ($detailpesan as $dp)
                                
                            <tr  class="table_row">
                                
                                <td class="column-1">
                                    {{$loop->iteration}}
                                </td>
                                <td class="column-2">{{$dp->name}}</td>
                                <td class="column-3">{{$dp->qty}}</td>
                                <td class="column-4"></td>
                            </tr>
                            
                            @endforeach
                            
                            
                        </table>
                    </div>
                    <br>
                    <a href="/" class="btn btn-primary float-right">Home</a>
                </div>
            </div>

            
        </div>
    </div>
</form>
@endsection