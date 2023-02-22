@extends('layouts.master')
@section('title')
    All Products
@endsection
@section('css')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ URL::asset('assets/css/product.css') }}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Products</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif


<!-- success message add product -->
<div class="col-xl-12">
	@if (session()->has('Add'))
	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<strong>{{ session()->get('Add') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
</div>
<!-- End success message add product -->

<!-- success message edit product -->
<div class="col-xl-12">
	@if (session()->has('Edit'))
	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<strong>{{ session()->get('Edit') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
</div>
<!-- End success message edit product -->

<!-- success message Delete product -->
<div class="col-xl-12">
	@if (session()->has('Delete'))
	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<strong>{{ session()->get('Delete') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
</div>
<!-- End success message Delete product -->

				<!-- row -->
				<div class="row">	
					<div class="col-12">
							<div class="table-responsive">
								<div class="table-wrapper">
									<div class="table-title">
										<div class="row">
											<div class="col-sm-8"><h2>Product <b>Details</b></h2></div>
											<div class="col-sm-4">
												<a class="modal-effect btn btn-info add-new" data-effect="effect-scale"
												data-toggle="modal" href="#modaldemo8"><i class="fa fa-plus"></i> Add New Product</a>
											</div>
										</div>
									</div>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Image</th>
												<th>Details</th>
												<th>Price</th>
												<th>Quantity</th>
												<th>Status</th>
												<th>Category</th>
												<th>SubCategory</th>
												<th>Created By</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($products as $product)
											<tr>
												<td>{{$product->id}}</td>
												<td>{{$product->name}}</td>
												<td><img class="imageuser" src="Images/users/{{ $product->image }}" alt=""></td>
												<td>{{$product->details}}</td>
												<td>{{$product->price}}</td>
												<td>{{$product->quantity}}</td>
												<td>{{$product->status}}</td>
												<td>{{$product->category->name}}</td>
												<td>{{$product->subCategory->name}}</td>
												<td>{{$product->created_by}}</td>
												<td>
													<a class="edit" title="Edit" data-id="{{$product->id}}" data-name="{{$product->name}}" 
														data-image="{{$product->image}}" data-status="{{$product->status}}" data-price="{{$product->price}}"
														data-quantity="{{$product->quantity}}" data-created_by="{{$product->created_by}}" 
														data-details="{{$product->details}}" data-category_name="{{ $product->category->name }}"
														data-sub_category_name="{{ $product->subCategory->name }}"
														data-toggle="modal" href="#modaldemo9">
														<i class="material-icons">&#xE254;</i></a>

													<a class="delete" title="Delete" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
														data-toggle="modal" href="#modaldemo7"><i class="material-icons">&#xE872;</i></a>
												</td>
											</tr>
											@endforeach 
										</tbody>
									</table>
								</div>
							</div>
						</div>  
						
						       <!-- Delete Modal effects-->
							   <div class="modal" id="modaldemo7">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content modal-content-demo">
										<div class="modal-header">
											<h6 class="modal-title">Delete Category</h6><button aria-label="Close" class="close"
												data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body">
											<form action="products/destroy" method="post" autocomplete="off">
												{{ method_field('delete') }}
												@csrf
												<div class="form-group">
													<p>You Are Sure Delete ? </p>
													<input type="text" class="form-control" name="name" id="name">
													<input type="hidden" class="form-control" name="id" id="id">
												</div>
						
												<div class="modal-footer">
													<button class="btn ripple btn-danger" type="submit">Delete</button>
													<button class="btn ripple btn-info" data-dismiss="modal" type="button">Close</button>
												</div>
											</form>
										</div>
						
									</div>
								</div>
							</div>
							<!-- End Modal effects-->
						
								<!-- Add Modal effects-->
								<div class="modal" id="modaldemo8">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content modal-content-demo">
											<div class="modal-header">
												<h6 class="modal-title">Add New Product</h6><button aria-label="Close" class="close"
													data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body">
												<form action="{{ Route('products.store') }}" method="post" autocomplete="off" enctype="multipart/form-data"> 
													@csrf
													<div class="form-group">
														<label for="name">Product Name : </label>
														<input type="text" class="form-control" name="name" id="name" required>
													</div>
													<div class="form-group">
														<label for="describtion"> Product Image : </label>
														<input type="file" class="form-control" name="image" id="image" required>
													</div>
													<div class="form-group">
														<label for="image">Product Detailes : </label>
														<input type="text" class="form-control" name="details" id="details">
													</div>
													<div class="d-flex justify-content-between">
													<div class="form-group">
														<label for="price">Product Price : </label>
														<input type="number" class="form-control" name="price" id="price">
													</div>
													<div class="form-group">
														<label for="quantity">Product Qyantity : </label>
														<input type="number" class="form-control" name="quantity" id="quantity">
													</div>
												</div>
													<div class="d-flex justify-content-between">
													<div class="form-group">
														<label for="category">Product Category : </label>
														<select class="form-control" name="category_id" id="category_id" 
														onclick="console.log($(this).val())"
                                					    onchange="console.log('change is firing')" required>

															<option value="" selected disabled>--Chose Category</option>
															@foreach ($categories as $category )
																<option value="{{$category->id}}">{{$category->name}}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="category">Product SubCategory : </label>
														<select class="form-control" name="sub_category_id" id="sub_category_id" required>

														</select>
													</div>
												</div>
													<div class="modal-footer">
														<button class="btn ripple btn-info" type="submit">Save</button>
														<button class="btn ripple btn-danger" data-dismiss="modal"
															type="button">Close</button>
													</div>
												</form>
											</div>
						
										</div>
									</div>
								</div>
								<!-- End Modal effects-->
						
						   <!-- Edit Modal effects -->
						   <div class="modal" id="modaldemo9">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">Edit Product</h6><button aria-label="Close" class="close"
											data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<form action="products/update" method="post" autocomplete="off">
											{{ method_field('patch') }}
											@csrf
											<div class="form-group">
												<label for="id">Product ID : </label>
												<input type="text" class="form-control" name="id" id="id" required>
											</div>
											<div class="form-group">
												<label for="name">Product Name : </label>
												<input type="text" class="form-control" name="name" id="name" required>
											</div>
											<div class="form-group">
												<label for="details">Product Details : </label>
												<input type="text" class="form-control" name="details" id="details" required>
											</div>
											<div class="form-group">
												<label for="image">Product Image : </label>
												<input type="text" class="form-control" name="image" id="image">
											</div>
											<div class="form-group">
												<label for="status">Product Status : </label>
												<input type="text" class="form-control" name="status" id="status">
											</div>
											<div class="form-group">
												<label for="price">Product Price : </label>
												<input type="number" class="form-control" name="price" id="price">
											</div>
											<div class="form-group">
												<label for="quantity">Product Qyantity : </label>
												<input type="number" class="form-control" name="quantity" id="quantity">
											</div>
											<div class="form-group">
												<label for="category">Product Category : </label>
												<select class="form-control" name="category_name" id="category_name" required>
													@foreach ($categories as $category )
														<option value="{{$category->name}}">{{$category->name}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label for="category">Product SubCategory : </label>
												<select class="form-control" name="sub_category_name" id="sub_category_name" required>
													@foreach ($sub_categories as $sub_category )
														<option value="{{$sub_category->name}}">{{$sub_category->name}}</option>
													@endforeach
												</select>
											</div>

											<div class="modal-footer">
												<button class="btn ripple btn-info" type="submit">Save changes</button>
												<button class="btn ripple btn-danger" data-dismiss="modal"
													type="button">Close</button>
											</div>
										</form>
									</div>
						
								</div>
							</div>
						</div>
						<!-- End Modal effects-->


					</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/js/product.js') }}"></script> --}}
    
	<!--Edit product js -->
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var image = button.data('image')
            var status = button.data('status')
            var category_name = button.data('category_name')
            var sub_category_name = button.data('sub_category_name')
            var details = button.data('details')
            var price = button.data('price')
            var quantity = button.data('quantity')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #image').val(image);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #category_name').val(category_name);
            modal.find('.modal-body #sub_category_name').val(sub_category_name);
            modal.find('.modal-body #details').val(details);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #quantity').val(quantity);
        })
    </script>
    <!--End edit product js -->

    <!--Delete product js -->
    <script>
        $('#modaldemo7').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
    <!--End Delete product js -->
	<script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: "{{ URL::to('products') }}/" + categoryId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_category_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_category_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
	
@endsection