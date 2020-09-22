<html>
<head>
	<title>Laporan PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
    <h5> Laporan PDF Tanggal {{$awal}} Sampai {{$akhir}}</h5>
	</center>
 
	<table class='table table-bordered'>
		thead>
                        
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
 
</body>
</html>