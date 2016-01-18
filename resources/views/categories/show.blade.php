@extends('layouts.app')

@section('content')
    <div class="container">
	<div class="col-sm-offset-2 col-sm-8">
	    <!-- Current Posts -->
	    @if (count($posts) > 0)
		<div class="panel panel-default">
		    <div class="panel-heading">
			{{ $category->title }}
		    </div>

		    <div class="panel-body">
			<table class="table table-striped post-table">
			    <thead>
				<th>Post</th>
				<th>&nbsp;</th>
			    </thead>
			    <tbody>
				@foreach ($posts as $post)
				    <tr>
					<td class="table-text"><div><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></div></td>

					<!-- Post Delete Button -->
					@if (Auth::user() && ($post->user_id === Auth::user()->id || Auth::user()->type === 'admin'))
					    <td>
						<form action="/posts/{{ $post->id }}" method="POST">
						    {{ csrf_field() }}
						    {{ method_field('DELETE') }}

						    <button type="submit" id="delete-post-{{ $post->id }}" class="btn btn-danger">
							<i class="fa fa-btn fa-trash"></i>Delete
						    </button>
						</form>
					    </td>
					@endif
				    </tr>
				@endforeach
			    </tbody>
			</table>
		    </div>
	        </div>
	    @else
		<div class="panel panel-default">
                    <div class="panel-heading">
                        No posts were found
                    </div>
		</div>
	    @endif
	</div>
    </div>
@endsection
