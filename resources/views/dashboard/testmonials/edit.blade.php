@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Testmonials</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit Testmonial </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
	<div class="col">
		<form action="{{route('dashboard.testmonials.update', $testmonial->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div>
				<label for="title" class="mt-3">Auther</label>
				<input type="text" name="auther" value="{{$testmonial->auther}}" class="form-control">
				@error('auther')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="content" class="mt-3">Content</label>
				<input type="text" name="content" value="{{$testmonial->content}}" class="form-control">
				@error('content')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
            <div>
                <img src="{{URL::asset('testmonials_photos/'.$testmonial->image)}}" class="img-fluid mt-3" style=" width:250px;" alt="image">
            </div>
	</div>
	<div class="col">
		<div>
			<label for="title_ar" class="mt-3">Auther_Ar</label>
			<input type="text" name="auther_ar" value="{{$testmonial->auther_ar}}" class="form-control">
			@error('auther_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="content_ar" class="mt-3">Content_Ar</label>
			<input type="text" name="content_ar" value="{{$testmonial->content_ar}}" class="form-control">
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