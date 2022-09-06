@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Events</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create
				Event </span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
	<div class="col">
		<form action="{{route('dashboard.events.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div>
				<label for="title" class="mt-3">Title</label>
				<input type="text" required name="title" class="form-control">
				@error('title')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="content" class="mt-3">Content</label>
				<textarea type="text" required name="content" class="form-control"></textarea>
				@error('content')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="place" class="mt-3">Place</label>
				<input type="text" required name="place" class="form-control">
				@error('place')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
        <div>
			<label for="start_date" class="mt-3">Start date</label>
			<input type="date" required name="start_date" class="form-control">
			@error('start_date')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
        <div>
            <label for="category" class="mt-3">Category</label>
            <select name="category_id" required class="form-control">
            <option value="">select category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
	</div>
	<div class="col">
		<div>
			<label for="title_ar" class="mt-3">Title_Ar</label>
			<input type="text" required name="title_ar" class="form-control">
			@error('title_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="content_ar" class="mt-3">Content_Ar</label>
			<textarea type="text" required name="content_ar" class="form-control"></textarea>
			@error('content_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="place_ar" class="mt-3">place_Ar</label>
			<input type="text" required name="place_ar" class="form-control">
			@error('place_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
        <div>
			<label for="end_date" class="mt-3">End date</label>
			<input type="date" required name="end_date" class="form-control">
			@error('end_date')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="image" class="mt-3">Image</label>
			<input type="file" required name="image" id="" class="form-control">
			@error('image')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
</div>
<div class="row">
	<input type="submit" class="btn btn-primary mt-4 ml-3" value="Add Event">
</div>
	</form>


<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script>
	CKEDITOR.replace('content')
	CKEDITOR.replace('content_ar')
</script>
@endsection