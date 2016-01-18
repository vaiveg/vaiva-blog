@extends('layouts.app')

@section('content')
    <div class="container">
	<div class="col-sm-offset-2 col-sm-8">
	    <!-- Current Posts -->
	    <div class="panel panel-default">
		<div class="panel-heading">
		    {{ $post->title }}
		</div>

		<div class="panel-body">
		    <table class="table table-striped post-table">
			<tbody>
			    <tr>
				<td>{{ $post->created_at }}</td>
			    </tr>
			</tbody>
		    </table>
		    {{ $post->content }}
		</div>
	    </div>
	</div>
    </div>
@endsection
