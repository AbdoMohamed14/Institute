@extends('layouts.master')
@section('css')
<!-- Internal Gallery css -->
<link href="{{URL::asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Galleries</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$gallery->name}}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<a href="{{route('dashboard.galleries.create')}}" type="button" style="color: aliceblue" class="btn btn-info btn-icon ml-2"><i class="fa fa-arrow-right"></i></a>
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
				<!-- Gallery -->
				<div class="demo-gallery">
					<ul id="lightgallery" class="list-unstyled row row-sm pr-0">
						<li class="col-sm-6 col-lg-4" data-responsive="{{URL::asset('assets/img/photos/1.jpg')}}" data-src="{{URL::asset('assets/img/photos/1.jpg')}}" data-sub-html="<h4>Gallery Image 1</h4>" >
							<a href="">
								<img class="img-responsive" src="{{URL::asset('assets/img/photos/1.jpg')}}" alt="Thumb-1">
							</a>
						</li>
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