@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Events</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit
				Event </span><span class=" mt-1 tx-13 mr-2 mb-0" style="color: blue">/ {{$event->title}} </span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
	<div class="col">
		<form action="{{route('dashboard.events.update', $event->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
            @method('PUT')
			<div>
				<label for="title" class="mt-3">Title</label>
				<input type="text" name="title" value="{{$event->title}}" class="form-control">
				@error('title')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="content" class="mt-3">Content</label>
				<textarea type="text" name="content" class="form-control">{!! $event->content !!}</textarea>
				@error('content')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="place" class="mt-3">Place</label>
				<input type="text" name="place" value="{{$event->place}}" class="form-control">
				@error('place')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
        <div>
			<label for="start_date" class="mt-3">Start date</label>
			<input type="date" name="start_date" value="{{$event->start_date}}" class="form-control">
			@error('start_date')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
        <div>
            <label for="category" class="mt-3">Category</label>
            <select name="category_id"  class="form-control">
                <option value="{{$event->category->id}}" >{{$event->category->name}}</option>
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
			<input type="text" name="title_ar" value="{{$event->title_ar}}" class="form-control">
			@error('title_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="content_ar" class="mt-3">Content_Ar</label>
			<textarea type="text" name="content_ar" class="form-control">{!! $event->content_ar !!}</textarea>
			@error('content_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="place_ar" class="mt-3">Place_Ar</label>
			<input type="text" name="place_ar" value="{{$event->place_ar}}" class="form-control">
			@error('place_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
        <div>
			<label for="end_date" class="mt-3">End date</label>
			<input type="date" name="end_date" value="{{$event->end_date}}" class="form-control">
			@error('end_date')
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
<script>
	CKEDITOR.replace('content')
	CKEDITOR.replace('content_ar')

</script>
@endsection