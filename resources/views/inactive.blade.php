@extends('layouts.master2')
@section('title')
    Block Account
@endsection
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row">
				
				<!-- The content half -->
				<div class="col-12 bg-white">
					<div class=" d-flex align-items-center py-5">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="mb-3 d-flex mx-auto"> <a href="{{ url('/' . $page='index') }}" class="mx-auto d-flex"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40 mx-auto" alt="logo"><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28 text-dark ml-2">St<span>oc</span>k</h1></a></div>
									<div class="main-card-signin d-md-flex bg-white">
										<div class="p-4 wd-100p">
											<div class="main-signin-header">
												<div class="avatar avatar-xxl avatar-xxl mx-auto text-center mb-2"><img alt="" class="avatar avatar-xxl rounded-circle  mt-2 mb-2 " src="{{URL::asset('assets/img/faces/6.jpg')}}"></div>
												<div class="mx-auto text-center mt-4 mg-b-20">
													<h1 class="mg-b-10">{{ Auth::user()->name }}</h1>
													<h3 class=" text-muted">Sorry Your Account Are Blocked</h3>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection