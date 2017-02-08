@extends('app')

@section('stylesheets')

@endsection

@section('scripts')

@endsection

@section('content')
<div class="container">
	<div class="columns">
		<div class="column">
			<div class="panel">
				<div class="panel-heading">Your Profile</div>
				<div class="panel-block">
					<form class="form" style="width: 100%;" role="form" method="PUT" action="{{ url('/profile') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="label">Name</label>

							<div class="control">
								<input id="name" type="text" class="input" name="name" value="{!! \Auth::user()->name !!}" required autofocus>

								@if ($errors->has('name'))
									<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
							<label for="birthdate" class="label">Birthdate</label>

							<div class="control">
								<select id="dobmonth" name="dobmonth" class="select"></select>
								<select id="dobday" name="dobday" class="select"></select>
								<select id="dobyear" name="dobyear" class="select"></select>

								@if ($errors->has('birthdate'))
									<span class="help-block">
								<strong>{{ $errors->first('birthdate') }}</strong>
							</span>
								@endif
							</div>
						</div>


						<div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
							<label for="height" class="label">Height (inches)</label>

							<div class="control">
								<input id="height" type="number" class="input" name="height" value="{!! Auth::user()->height !!}" required autofocus>

								@if ($errors->has('height'))
									<span class="help-block">
								<strong>{{ $errors->first('height') }}</strong>
							</span>
								@endif
							</div>
						</div>


						<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
							<label for="female" class="label">Gender</label>

							<div class="control">
								<div class="form-check">
									<label class="radio">
										<input aria-label="Male" id="male" type="radio" class="radio" name="female[]" value="0" required autofocus {!! (!Auth::user()->female)?'checked="checked"':'' !!} />
										Male
									</label>

								</div>
								<div class="form-check">
									<label class="radio">
										<input aria-label="Female" id="female" type="radio" class="radio" name="female[]" value="1" required autofocus {!! (Auth::user()->female)?'checked="checked"':'' !!} />
										Female
									</label>

								</div>


								@if ($errors->has('gender'))
									<span class="help-block">
								<strong>{{ $errors->first('gender') }}</strong>
							</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="label">E-Mail Address</label>

							<div class="control">
								<input id="email" type="email" class="input" name="email" value="{!! Auth::user()->email !!}" required>

								@if ($errors->has('email'))
									<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="label">Password</label>

							<div class="control">
								<input id="password" type="password" class="input" name="password" required>

								@if ($errors->has('password'))
									<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label for="password-confirm" class="label">Confirm Password</label>

							<div class="control">
								<input id="password-confirm" type="password" class="input" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="button is-primary is-outlined is-fullwidth">
								Register
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@foreach ( $photos as $key => $photo )
		<div class="column">
			<div class="panel">
				<div class="panel-heading">Latest {!! ucfirst($key) !!} Photo</div>
				<div class="panel-block"><img src="{!! $photo !!}" /></div>
			</div>
		</div>
		@endforeach
	</div>

</div>
@endsection

@section('blocking-scripts')
<script src="/js/dobPicker.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.dobPicker({
            daySelector: '#dobday', /* Required */
            monthSelector: '#dobmonth', /* Required */
            yearSelector: '#dobyear', /* Required */
            dayDefault: 'Day', /* Optional */
            monthDefault: 'Month', /* Optional */
            yearDefault: 'Year', /* Optional */
            minimumAge: 8, /* Optional */
            maximumAge: 100 /* Optional */
        });
    });
</script>
@endsection
