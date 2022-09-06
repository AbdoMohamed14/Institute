@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Instructors</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create
				Instructor </span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
	<div class="col">
		<form action="{{route('dashboard.instructors.update', $instructor->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
            @method('PUT')
			<div>
				<label for="name" class="mt-3">Name</label>
				<input type="text" name="name" value="{{$instructor->name}}" class="form-control">
				@error('name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="preif" class="mt-3">Preif</label>
				<input type="text" name="preif" value="{{$instructor->preif}}" class="form-control">
				@error('preif')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="desc" class="mt-3">Description</label>
				<input type="text" name="desc" value="{{$instructor->desc}}" class="form-control">
				@error('desc')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
            <div>
				<label for="position" class="mt-3">Position</label>
				<input type="text" name="position" value="{{$instructor->position}}" class="form-control">
				@error('position')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
	</div>
	<div class="col">
		<div>
			<label for="name_ar" class="mt-3">Name_Ar</label>
			<input type="text" name="name_ar" value="{{$instructor->name_ar}}" class="form-control">
			@error('name_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="preif_ar" class="mt-3">Preif_Ar</label>
			<input type="text" name="preif_ar" value="{{$instructor->preif_ar}}" class="form-control">
			@error('preif_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
        <div>
            <label for="desc_ar" class="mt-3">Description_Ar</label>
            <input type="text" name="desc_ar" value="{{$instructor->desc_ar}}" class="form-control">
            @error('desc_ar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="position_ar" class="mt-3">Position_Ar</label>
            <input type="text" name="position_ar" value="{{$instructor->position_ar}}" class="form-control">
            @error('position_ar')
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
	<input type="submit" class="btn btn-primary mt-4 ml-3" value="Save Changes">
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