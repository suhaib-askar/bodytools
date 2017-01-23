@extends('app')

@section('stylesheets')

@endsection

@section('scripts')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label for="birthdate" class="col-md-4 control-label">Birthdate</label>

                            <div class="col-md-6">
                                <select id="dobmonth" name="dobmonth"></select>
                                <select id="dobday" name="dobday"></select>
                                <select id="dobyear" name="dobyear"></select>

                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="female" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input aria-label="Male" id="male" type="radio" class="form-check-input" name="female[]" value="0" required autofocus />
                                        Male
                                    </label>

                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input aria-label="Female" id="female" type="radio" class="form-check-input" name="female[]" value="1" required autofocus />
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
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
