@extends('layout')

@section('content')
	{{--<form method="POST" action="/auth/register">--}}
		{{--{!! csrf_field() !!}--}}

		{{--<div>--}}
			{{--Name--}}
			{{--<input type="text" name="name" value="{{ old('name') }}">--}}
		{{--</div>--}}

		{{--<div>--}}
			{{--Email--}}
			{{--<input type="email" name="email" value="{{ old('email') }}">--}}
		{{--</div>--}}

		{{--<div>--}}
			{{--Password--}}
			{{--<input type="password" name="password">--}}
		{{--</div>--}}

		{{--<div>--}}
			{{--Confirm Password--}}
			{{--<input type="password" name="password_confirmation">--}}
		{{--</div>--}}

		{{--<div>--}}
			{{--<button type="submit">Register</button>--}}
		{{--</div>--}}
	{{--</form>--}}

	<link rel="stylesheet" href="/css/loginAndRegister.css">


	<div class="row loginAndRegisterContent">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}"> {{--value="{{ old('name') }}"--}}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email"> {{-- value="{{ old('email') }}"--}}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
	</div>

@endsection
