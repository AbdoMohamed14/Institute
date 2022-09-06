@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Profile</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{Auth::user()->name}} </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
@if(session()->has('message'))
<div class="alert alert-success">
	{{ session()->get('message') }}
	<button type="button" class="close" data-dismiss = 'alert'>x</button>
</div>
@endif
<div class="row">
	<div class="col">
		<form action="{{route('dashboard.users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div>
				<label for="username" class="mt-3">Name</label>
				<input type="text"  name="username" value="{{$user->name}}" class="form-control">
				@error('username')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="email" class="mt-3">Email</label>
				<input type="email"  name="email" value="{{$user->email}}" class="form-control">
				@error('email')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
	</div>
	<div class="col">
		<div>
			<label for="username_ar" class="mt-3">Name_ar</label>
			<input type="text" name="username_ar" value="{{$user->name_ar}}" class="form-control">
			@error('username_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="" class="mt-3">Image</label>
			<input type="file" name="image" id="" class="form-control">
			@error('image')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
</div>
<div class="row">
		<input type="submit" class="btn btn-primary mt-4 ml-3" value="Update Information">
</div>
</form>

<!-- row closed -->
</div>

<hr>

<div class="row ml-2">
	<div class="col-6">
		<form action="{{route('dashboard.reset_password')}}" method="POST">
			@csrf
			<div>
				<label for="old_password" class="mt-3">Old Password</label>
				<input type="password"  name="old_password" class="form-control">
				@error('old_password')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="password" class="mt-3">New Password</label>
				<input type="password"  name="password" class="form-control">
				@error('password')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="password" class="mt-3">Confirm New Password</label>
				<input type="password"  name="password_confirmation" class="form-control">
				@error('password_confirmation')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<input type="submit" class="btn btn-primary m-2" value="Reset Password">
			</div>
		</form>
	</div>
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
@endsection