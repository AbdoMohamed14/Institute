@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Informations</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
					<button type="button" class="close" data-dismiss = 'alert'>x</button>
				</div>
				@endif
				<!-- row -->
				<div class="row">
					<div class="col">
						<form action="{{route('dashboard.settings.update',$settings->id)}}" method="POST" >
							@csrf
							@method('PUT')
							<div>
								<label for="name" class="mt-3"><b>Site Name</b></label>
								<input type="text" name="name" value="{{$settings->name}}" class="form-control">		
							</div>
							<div>
								<label class="mt-3"><b>Description</b></label>
								<textarea type="text" name="disc" class="form-control">{!! $settings->disc !!}</textarea>
							</div>
							<div>
								<label class="mt-3"><b>Address</b></label>
								<input type="text" name="place" value="{{$settings->place}}" class="form-control">
							</div>
							<div>
								<label class="mt-3"><b>Phone</b></label>
								<input type="text" name="num" value="{{$settings->num}}" class="form-control">
							</div>
							<div>
								<label class="mt-3"><b>Facebook</b></label>
								<input type="text" name="facebook" value="{{$settings->facebook}}" class="form-control">
							</div>
							<div>
								<label class="mt-3"><b>Twitter</b></label>
								<input type="text" name="twitter" value="{{$settings->twitter}}" class="form-control">
							</div>
					</div>
					<div class="col">   
							<div>
							<label for="name_ar" class="mt-3"><b>Site Name_Ar</b></label>
							<input type="text" name="name_ar" value="{{$settings->name_ar}}" class="form-control">				
							</div>
							<div>
								<label for="desc_ar" class="mt-3"><b>Description Ar</b></label>
								<textarea type="text" name="disc_ar" class="form-control">{!! $settings->disc_ar !!}</textarea>
							</div>
							<div>
								<label class="mt-3"><b>Address_Ar</b></label>
								<input type="text" name="place_ar" value="{{$settings->place_ar}}" class="form-control">
							</div>
							<div>
								<label class="mt-3"><b>Email</b></label>
								<input type="text" name="email" value="{{$settings->email}}" class="form-control">
							</div>
							<div>
								<label class="mt-3"><b>Youtube</b></label>
								<input type="text" name="youtube" value="{{$settings->youtube}}" class="form-control">
							</div>
							<div>
								<label class="mt-3"><b>Home Video</b></label>
								<input type="text" name="home_video" value="{{$settings->home_video}}" class="form-control">
							</div>
					</div>											
					<!-- row closed -->

				</div>
				<div class="row" style="justify-content: right">
					<div class="col-6 col-md-4">
							<input type="submit" value="Save Changes" class="btn btn-primary mt-4">
						</form>
					</div>						
				</div>
				<hr>
				<hr>
				<div class="row">
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ images</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div>
							<label class="mt-3"><b>logo</b></label>
								<div>
									<img src="{{URL::asset('app/'.$settings->logo)}}" style="height: 100px" alt="logo"><br>
								</div>
						</div>

					</div>{{-- end logo pic col --}}
					<div class="col">
						<div style="height: 160px">
							<form action="{{route('dashboard.settings.store')}}" method="POST" enctype="multipart/form-data" >
								@csrf
								<label class="mt-3"><b>Choose The logo</b></label>
								<input type="file" required name="logo" class="form-control">
								<input type="hidden" name="img" value="logo">
									@if ($errors->has('logo'))
										<div class="alert alert-danger alert-block">
											<button type="button" class="close" data-dismiss="alert">×</button>	
												<strong>{{ $errors->first('logo') }}</strong>
										</div>
									@endif
								<input style="width:150px;" type="submit" value="Update Logo" class="btn btn-primary mt-2 ml-3">
							</form>	
						</div>
					</div>{{-- end logo form col --}}
				</div>{{-- end logo row --}}
				<hr>
				<div class="row">
					<div class="col">
						<div>
							<label class="mt-3"><b>Avatar</b></label>
								<div>
									<img src="{{URL::asset('app/'.$settings->avatar)}}" style="height: 100px" alt="avatar"><br>
								</div>
						</div>
					</div>{{--end avatar pic col--}}
					<div class="col">
						<div style="height: 160px">
							<form action="{{route('dashboard.settings.store')}}" method="POST" enctype="multipart/form-data" >
								@csrf
								<label class="mt-3"><b>Choose The Avatar</b></label>
								<input type="file" required name="logo" class="form-control">
								<input type="hidden" name="img" value="avatar">
									@if ($errors->has('logo'))
										<div class="alert alert-danger alert-block">
											<button type="button" class="close" data-dismiss="alert">×</button>	
												<strong>{{ $errors->first('logo') }}</strong>
										</div>
									@endif
								<input style="width:150px;" type="submit" value="Update Avatar" class="btn btn-primary mt-2 ml-3">
							</form>
						</div>
					</div>{{--end avatar form col--}}
				</div>{{--end avatar row--}}
                <hr>
				<div class="row">
					<div class="col">
						<div>
							<label class="mt-3"><b>Background</b></label>
								<div>
									<img src="{{URL::asset('app/'.$settings->back)}}" style="height: 100px" alt="bg"><br>
								</div>
						</div>
					</div>{{--end background pic col--}}
					<div class="col">
						<div style="height: 160px">
							<form action="{{route('dashboard.settings.store')}}" method="POST" enctype="multipart/form-data" >	
								@csrf
								<label class="mt-3"><b>Choose The Background</b></label>
								<input type="file" required name="logo" class="form-control">
								<input type="hidden" name="img" value="back">
									@if ($errors->has('logo'))
										<div class="alert alert-danger alert-block">
											<button type="button" class="close" data-dismiss="alert">×</button>	
												<strong>{{ $errors->first('logo') }}</strong>
										</div>
									@endif
								<input style="width:150px;margin-bottom: 25px;" type="submit" value="Update Background" class="btn btn-primary mt-2 ml-3">
							</form>
						</div>
					</div>{{--end background form col--}}
				</div>{{--end background row--}}

				<hr>
				<hr>
				<div class="row justify-content-center">
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Slider</span>
							</div>
						</div>
					</div>
				</div>
				<form action="{{route('dashboard.slider_add')}}" method="POST" enctype="multipart/form-data" >	
					<div class="row">
							@csrf
							<div class="col">
								<label class="mt-2"><b>Image</b></label>
								<input type="file" required name="img" class="form-control">							
							</div>
							<div class="col">
								<label class="mt-2"><b>Order:</b></label>
								<input type="number" required name="order" id="" class="form-control">
							</div>
							<div class="col mt-auto">
								<input type="submit" value="Add Slider Image" class="btn btn-primary mt-4">
							</div>
					</div>
				</form>
				<hr>
					<div>
						<table class="table table-bordered mt-4" style="text-align: center;">
							<thead class="thead-light">
							  <tr>
								<th>Image</th>
								<th>Order</th>
								<th>Update Order</th>
								<th>Handle</th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($slider_photos as $slide)
								 <tr>
									<th><img src="{{URL::asset('slider_photos/' .$slide->image)}}" alt="img" style="width:100px; height:80px"></th>
									<td style="vertical-align: middle;"><b>{{$slide->order}}</b></td>
									<td style="vertical-align: middle;">
											<form action="{{route('dashboard.slider_update', $slide->id)}}" method="POST">
												@csrf
												<div class="d-flex justify-content-center">
												<input type="number" required name="order" class="from-control" style="width: 40px">
												<input type="submit" value="Update" class="btn btn-primary ml-2">
											</div>
											</form>
									</td>
									<td style="vertical-align: middle;">
										<form action="{{route('dashboard.slider_remove', $slide->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<input type="submit" value="Remove" class="btn btn-danger">
										</form>
									</td>
								  </tr>
								@endforeach
							</tbody>
						  </table>
					</div>

					

					
				
		</div>
			<!-- Container closed -->
	</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script>
	CKEDITOR.replace('disc')
	CKEDITOR.replace('disc_ar')
</script>
@endsection

