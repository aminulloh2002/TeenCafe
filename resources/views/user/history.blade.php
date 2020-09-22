@extends('user.template')
@section('title','History')
@section('content')

	

	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-10 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">No</th>
									<th class="column-2">Nama</th>
									<th class="column-3">Total</th>
									<th class="column-4">Status</th>
									<th class="column-5">Detail</th>
								</tr>

								

								<tr v-for="(data,index) in datas" class="table_row">
									<td class="column-1">
										${index+1}
									</td>
									<td class="column-2">${data.name_customer}</td>
									<td class="column-3">${data.total_price}</td>
									<td class="column-4">${data.status_order}</td>
									<td class="column-5"><a v-bind:href="'/detailhistory/'+data.id" class="btn btn-primary">Detail</a></td>
								</tr>
								
								
								
							</table>
						</div>

						
					</div>
				</div>

				
			</div>
		</div>
	</form>

@endsection
		

	