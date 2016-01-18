@extends('layouts.app')

@section('content')
    <div class="container">
	<div class="col-sm-offset-2 col-sm-8">
	    <div class="panel panel-default">
		<div class="panel-heading">
		    Welcome
		</div>

		@if (Auth::guest())
		    <div class="panel-body">
			You can create your blog here! Please register or login.
		    </div>
		@else
		    <div class="panel-body">
                        Good to see you logged in!
                    </div>
		@endif
	    </div>
	</div>
   </div>
@endsection
