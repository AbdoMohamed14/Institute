@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Galleries</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add Photo
			</span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
	<div class="col">
		<form action="{{route('dashboard.gallery_photos.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div>
				<div>
					<label for="name" class="mt-3">Gallery</label>
					<select name="gallery">
						<option value=""></option>
						@foreach ($galleries as $gallery)
							<option value="{{$gallery->id}}">{{$gallery->name}}</option>
						@endforeach
					</select>
					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>	
			</div>
			<div>
				<label for="name" class="mt-3">Image</label>
				<input type="file"  name="image" class="form-control">
				@error('name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
	</div>

</div>
<div class="row">
	<input type="submit" class="btn btn-primary mt-4 ml-3" value="Add Photo">
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