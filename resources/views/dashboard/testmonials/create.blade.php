@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Testmonials</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create
				Testmonial </span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
	<div class="col">
		<form action="{{route('dashboard.testmonials.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div>
				<label for="auther" class="mt-3">Auther</label>
				<input type="text" name="auther" class="form-control">
				@error('auther')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="content" class="mt-3">Content</label>
				<textarea type="text" name="content" class="form-control"></textarea>
				@error('content')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

	</div>
	<div class="col">
		<div>
			<label for="auther_Ar" class="mt-3">Auther_Ar</label>
			<input type="text" name="auther_ar" class="form-control">
			@error('auther_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="content_ar" class="mt-3">Content_Ar</label>
			<textarea type="text" name="content_ar" class="form-control"></textarea>
			@error('content_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="image" class="mt-3">Image</label>
			<input type="file" name="image" id="" class="form-control">
			@error('image')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
</div>
<div class="row">
	<input type="submit" class="btn btn-primary mt-4 ml-3" value="Add Testmonial">
</div>
	</form>


<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

@endsection
@section('js')
@endsection