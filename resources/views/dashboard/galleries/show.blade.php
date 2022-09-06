@extends('layouts.master')
@section('title', 'ATIEC|GALLERIES')
@section('css')
<!-- Internal Gallery css -->
<link href="{{URL::asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<a href="{{route('dashboard.galleries.index')}}" class="btn btn-info mb-2">Back to galleries</a>
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Galleries</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$gallery->name}}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 d-flex mb-3 mb-xl-0">
							<form action="{{route('dashboard.gallery_photos.store')}}" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="file" name="image" class="form-control">
								<input type="hidden" name="gallery_id" value="{{$gallery->id}}">
								<button type="submit" class="btn btn-primary m-2">Add Photo</button>
							</form>
							@error('image')
							<div class="alert alert-danger" style="max-height: 40px">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- Gallery -->
				<div class="demo-gallery">
					<ul id="lightgallery" class="list-unstyled row row-sm pr-0">
						@foreach ($gallery->gallery_photos as $photo)
						<li class="col-sm-6 col-lg-4" data-responsive="{{URL::asset('galleries_photos/'.$photo->image)}}" data-src="{{URL::asset('galleries_photos/'.$photo->image)}}" data-sub-html="<h4>Gallery Image 1</h4>" >
							<a href="">
								<img class="img-responsive" style="height: 300px" src="{{URL::asset('galleries_photos/'.$photo->image)}}" alt="Thumb-1">
							</a>
						</li>
						@endforeach

					</ul>
					<!-- /Gallery -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Gallery js -->
<script src="{{URL::asset('assets/plugins/gallery/lightgallery-all.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/gallery/jquery.mousewheel.min.js')}}"></script>
<script src="{{URL::asset('assets/js/gallery.js')}}"></script>
@endsection