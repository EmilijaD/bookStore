@extends('layout')

@section('content')
	{{--<form method="POST" action="/auth/login">--}}
		{{--{!! csrf_field() !!}--}}

		{{--<div>--}}
			{{--Email--}}
			{{--<input type="email" name="email" value="{{ old('email') }}">--}}
		{{--</div>--}}

		{{--<div>--}}
			{{--Password--}}
			{{--<input type="password" name="password" id="password">--}}
		{{--</div>--}}

		{{--<div>--}}
			{{--<input type="checkbox" name="remember"> Remember Me--}}
		{{--</div>--}}

		{{--<div>--}}
			{{--<button type="submit">Login</button>--}}
		{{--</div>--}}
	{{--</form>--}}

	<link rel="stylesheet" href="/css/loginAndRegister.css">


	<div class="row loginAndRegisterContent">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{old('email') }}"> {{--{{value :  old('email') }}--}}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Login</button>

								{{--<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>--}}
							</div>
						</div>
					</form>
				</div>
		</div>
	</div>

@endsection
