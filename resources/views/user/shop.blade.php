@extends('user.template')
@section('title','Shop')
@section('content')

<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
						Women
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Men
					</button>

					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				
			</div>

			<div class="row isotope-grid">
			<div v-for="(product,index) in products" :key="product.id">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item" >
					<!-- Block2 -->
					<div class="block2">
					<div class="block2-pic hov-img0" >
							<img v-bind:src="'image/product/'+product.image" alt="IMG-PRODUCT" style="max-height: 200px !important">

							<p v-on:click="modal(index)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" onmouseover="this.style.cursor='pointer'">
								Quick View
							</p>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<p v-on:click="modal(index)" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" onmouseover="this.style.cursor='pointer'">
									${product.name}
								</p>
								<span class="stext-105 cl3">
									${product.price}
								</span>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>
	
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" v-bind:class="showm">
		<div class="overlay-modal1" v-on:click="hidemodal()"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04"  v-on:click="hidemodal()">
					<img src="{{asset('user/images/icons/icon-close.png')}}" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-pic-w pos-relative">
								<img v-bind:src="dmodal.image" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								${dmodal.name}
							</h4>

							<span class="mtext-106 cl2">
								${dmodal.price}
							</span>

							<p class="stext-102 cl3 p-t-23">
								${dmodal.description}
							</p>
							
							<!--  -->
							<div class="p-t-33">
								
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div v-on:click="qd()" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input v-model="cqty" class="mtext-104 cl3 txt-center num-product" type="number" disabled >

											<div v-on:click="qi(dmodal.qty)" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button v-on:click="order(cqty)" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection