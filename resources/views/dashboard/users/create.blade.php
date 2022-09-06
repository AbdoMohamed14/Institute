@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Users</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create User
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
		<form action="{{route('dashboard.users.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div>
				<label for="username" class="mt-3">Name</label>
				<input type="text"  name="username" class="form-control">
				@error('username')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="email" class="mt-3">Email</label>
				<input type="email"  name="email" class="form-control">
				@error('email')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="password" class="mt-3">Password</label>
				<input type="password"  name="password" class="form-control">
				@error('password')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label for="password" class="mt-3">Confirm Password</label>
				<input type="password" name="password_confirmation" class="form-control">
				@error('password_confirmation')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

	</div>
	<div class="col">
		<div>
			<label for="username_ar" class="mt-3">Name_ar</label>
			<input type="text" name="username_ar" class="form-control">
			@error('username_ar')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="username_ar" class="mt-3">Membership</label>
			<select name="member_type" class="form-control">
				<option value="">Select Membership</option>
				<option value= 0>Normal Member</option>
				<option value= 1>Premium Member</option>
			</select>
			@error('member_type')
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
	<input type="submit" class="btn btn-primary mt-4 ml-3" value="Add User">
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