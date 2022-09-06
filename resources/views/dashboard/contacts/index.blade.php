@extends('layouts.master')
@section('title', 'ATIC')
	
@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Contacts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Contacts</span>
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
					<table class="table table-bordered" style="text-align: center">
						<thead class="thead-light">
						  <tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Message</th>
							<th scope="col">phone</th>
							<th scope="col">Contacted By</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($contacts as $contact)
							<tr>
								<th scope="row">{{$contact->id}}</th>
								<td><b>{{$contact->name}}</b></td>
								<td><b>{{$contact->email}}</b></td>
								<td><b>{{$contact->message}}</b></td>
								<td><b>{{$contact->phone_num}}</b></td>
								<td>
									@if (!$contact->status)
									<form action="{{route('dashboard.contacts.update', $contact->id)}}" method="POST">
										@csrf
										@method('PUT')
										<input type="submit" class="btn btn-info" value="Contact">
									</form>
								@else
								<b>{{$contact->contacted_by}}</b>
								@endif
							</td>
							</tr>
							@endforeach

						</tbody>
					  </table>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection