@extends('layouts.app')

@section('content')
    <div class="container">
	<div class="col-sm-offset-2 col-sm-8">
	    <div class="panel panel-default">
		<div class="panel-heading">
		    Login
		</div>

		<div class="panel-body">
		    <!-- Display Validation Errors -->
		    @include('common.errors')

		    <!-- New Task Form -->
		    <form action="/auth/login" method="POST" class="form-horizontal">
			{{ csrf_field() }}

                        <!-- Username -->
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>

                            <div class="col-sm-6">
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                            </div>
                        </div>

			<!-- Password -->
			<div class="form-group">
			    <label for="password" class="col-sm-3 control-label">Password</label>

			    <div class="col-sm-6">
				<input type="password" name="password" class="form-control">
			    </div>
			</div>

			<!-- Login Button -->
			<div class="form-group">
			    <div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
				    <i class="fa fa-btn fa-sign-in"></i>Login
				</button>
			    </div>
			</div>
		    </form>
		</div>
	    </div>
	</div>
    </div>
@endsection
