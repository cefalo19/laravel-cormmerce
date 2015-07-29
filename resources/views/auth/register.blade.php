@extends('layouts.store')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
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

                        <fieldset>
                            <legend>User</legend>
						    <div class="form-group">
							    <label class="col-md-4 control-label">Name</label>
							    <div class="col-md-6">
								    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
							    </div>
						    </div>

						    <div class="form-group">
							    <label class="col-md-4 control-label">E-Mail Address</label>
							    <div class="col-md-6">
								    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
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
						</fieldset>

						<fieldset>
						    <legend>Address</legend>
						    <div class="form-group">
                                {!! Form::label('street', 'Street', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('address[street]', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('number', 'Number', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('address[number]', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', 'City', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('address[city]', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('state', 'State', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('address[state]', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('zip', 'Zip', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('address[zip]', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('country', 'Country', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('address[country]', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
						</fieldset>

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
	</div>
</div>
@endsection
