@extends('admin.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="ti-list"></i> Report Time
                </h3>
                <span class="pull-right">
                        <i class="fa fa-fw ti-angle-up clickable"></i>
                    </span>
            </div>
            <div class="panel-body">
                {{-- Search --}}
                <form action="/laporanorder/cari" method="GET" >
                    @csrf
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Start Date</label>
                                <div class="input-group">
                                    <select class="form-control m-t-5" name="bulan_start" required>
                                        <option value="01" >January</option>
                                        <option value="02" >February</option>
                                        <option value="03" >Maret</option>
                                        <option value="04" >April</option>
                                        <option value="05" >Mei</option>
                                        <option value="06" >Juni</option>
                                        <option value="07" >Juli</option>
                                        <option value="08" >Agustus</option>
                                        <option value="09" >September</option>
                                        <option value="10" >Oktober</option>
                                        <option value="11" >November</option>
                                        <option value="12" >Desember</option>
                                    </select>
                                </div>
                        
                                <div class="input-group">
                                    <select class="form-control m-t-10" name="tahun_start" required>
                                        <?php for($i=2018;$i<=date("Y");$i++){ ?>
                                            <option>
                                            <?=$i?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="">Finish Date</label>
                                <div class="input-group">
                                    <select class="form-control m-t-10" name="bulan_finish" required>
                                        <option value="01" >January</option>
                                        <option value="02" >February</option>
                                        <option value="03" >Maret</option>
                                        <option value="04" >April</option>
                                        <option value="05" >Mei</option>
                                        <option value="06" >Juni</option>
                                        <option value="07" >Juli</option>
                                        <option value="08" >Agustus</option>
                                        <option value="09" >September</option>
                                        <option value="10" >Oktober</option>
                                        <option value="11" >November</option>
                                        <option value="12" >Desember</option>
                                    </select>
                                </div>
                        
                                <div class="input-group">
                                    <select class="form-control m-t-10" name="tahun_finish" required>
                                        <?php for($i=2018;$i<=date("Y");$i++){ ?>
                                            <option>
                                            <?=$i?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            
                        </div>
                        <br>
                        <span class="pull-left">
                            <button 
                                class="btn btn-responsive button-alignment btn-success"
                                type="submit">
                                <i class="fa fa-fw ti-money"></i> Search
                            </button>
                            
                            <a href="/order/cetak_pdf/{{$awal}}/{{$akhir}}" class="btn btn-danger">Cetak PDF</a>
                        </span>
                   
                        {{-- <button class="btn btn-primary " type="submit">Cari</button> --}}
                    </div>
                </form>
                <br>
                <br>
                {{$awal}}-{{$akhir}}
                {{-- Close Search --}}
                <div class="table-responsive">
                    @if(session('status'))
                    <div class="alert alert-success col-md-12 mt-3 ml-3 mr-5">
                        {{session('status')}}
                    </div>
                    @endif
                    <table id="mytable" class="table table-bordred table-striped">
                        
                    
                        <thead>
                        
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Total Jumlah</th>
                            <th>Tanggal</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $od)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $od->name_customer}}</td>
                                <td>{{ $od->total_price}}</td>
                                <td>{{ $od->created_at}}</td>
                                
                                
                            </tr>
                                
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">DataTidak Ditemukan</td>
                                </tr>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection