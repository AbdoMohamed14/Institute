@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Galleries</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit Gallery / {{$gallery->name}}
			</span>
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
		<form action="{{route('dashboard.galleries.update', $gallery->id)}}" method="POST">
			@csrf
			@method('PUT')
			<div>
				<label for="name" class="mt-3">Name</label>
				<input type="text"  name="name" value="{{$gallery->name}}" class="form-control">
				@error('name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="desc" class="mt-3">Desctiption</label>
				<input type="text"  name="desc" value="{{$gallery->desc}}" class="form-control">
				@error('desc')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

	</div>
	<div class="col">
		<div>
			<label for="name_ar" class="mt-3">Name Ar</label>
			<input type="text"  name="name_ar" value="{{$gallery->name_ar}}" class="form-control">
			@error('name_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="desc_ar" class="mt-3">Desctiption_Ar</label>
			<input type="text"  name="desc_ar" value="{{$gallery->desc_ar}}" class="form-control">
			@error('desc_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
</div>
<div class="row">
	<input type="submit" class="btn btn-primary mt-4 ml-3" value="Save Changes">
</div>
</form>
<!-- row closed -->

<hr>
<!-- row open -->
@foreach ($gallery->gallery_photos as $photo)
<div class="card" style="width: 18rem;">
	<img class="img-responsive" src="{{URL::asset('galleries_photos/'.$photo->image)}}" alt="Thumb-1">
	<div class="card-body">
		<form action="{{route('dashboard.gallery_photos.destroy', $photo->id)}}" method="POST">
			@csrf
			@method('DELETE')
			<div style="text-align: center;">
				<input type="submit" class="btn btn-danger" value="Delete">
			</div>
		</form>
	</div>
  </div>
@endforeach


<!-- row closed -->

</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
@endsection