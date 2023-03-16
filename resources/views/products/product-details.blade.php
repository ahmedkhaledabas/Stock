@extends('layouts.master')
@section('title')
    Product Detailes

@endsection
@section('css')
<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/product.css') }}" rel="stylesheet">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Product-details</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">	
					<div class="col-12">
							<div class="table-responsive">
								<div class="table-wrapper">
									<div class="table-title">
										<div class="row">
											<div class="col-sm-8"><h2>Product <b>Details</b></h2></div>
										</div>
									</div>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Image</th>
												<th>Price</th>
												<th>Quantity</th>
												<th>Status</th>
												<th>Created By</th>
											</tr>
										</thead>
										<tbody>

											<tr>
												<td>{{$product->id}}</td>
												<td>{{$product->name}}</td>
												<td><img class="imageuser" src="Images/users/default.png" alt=""></td>
												<td>{{$product->price}}</td>
												<td>{{$product->quantity}}</td>
												<td>{{$product->status}}</td>
												<td>{{$product->created_by}}</td>
												
													</tr>
													

										</tbody>
									</table>
								</div>
							</div>
						</div>  
						
						    


					</div>
				<!-- row closed -->

				

		
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection