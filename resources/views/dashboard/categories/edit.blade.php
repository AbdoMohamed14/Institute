@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Categories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit Category / {{$category->name}}
			</span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
	<div class="col-6">
		<form action="{{route('dashboard.categories.update', $category->id)}}" method="POST">
			@csrf
            @method('PUT')
			<div>
				<label for="name" class="mt-3">Name</label>
				<input type="text"  name="name" value="{{$category->name}}" class="form-control">
				@error('name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="name_ar" class="mt-3">Name Ar</label>
				<input type="text"  name="name_ar" value="{{$category->name_ar}}" class="form-control">
				@error('name_ar')
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