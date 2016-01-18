@extends('layouts.app')

@section('content')
    <div class="container">
	<div class="col-sm-offset-2 col-sm-8">
	    @if (Auth::user())
	    <div class="panel panel-default">
		<div class="panel-heading">
		    New Post
		</div>

		<div class="panel-body">
		    <!-- Display Validation Errors -->
		    @include('common.errors')

		    <!-- New Post Form -->
		    <form action="/posts" method="POST" class="form-horizontal">
			{{ csrf_field() }}

			<!-- Post Title -->
			<div class="form-group">
			    <label for="post-title" class="col-sm-3 control-label">Title</label>

			    <div class="col-sm-6">
				<input type="text" name="title" id="post-title" class="form-control" value="{{ old('post') }}">
			    </div>
			</div>

			<!-- Post Content -->
                        <div class="form-group">
                            <label for="post-content" class="col-sm-3 control-label">Content</label>

                            <div class="col-sm-6">
                                <textarea name="content" id="post-content" class="form-control" rows="5" cols="40"></textarea>
                            </div>
                        </div>

			<!-- Post Category -->
                        <div class="form-group">
                            <label for="post-category" class="col-sm-3 control-label">Category</label>

                            <div class="col-sm-6">
                                <select name="category_id" id="post-category" class="form-control">
				    @foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->title }}</option>
				    @endforeach
				</select>
                            </div>
                        </div>

			<!-- Add Post Button -->
			<div class="form-group">
			    <div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
				    <i class="fa fa-btn fa-plus"></i>Add Post
				</button>
			    </div>
			</div>
		    </form>
		</div>
	    </div>
	    @endif

	    <!-- Current Posts -->
	    @if (count($posts) > 0)
		<div class="panel panel-default">
		    <div class="panel-heading">
			Current Posts
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
	    @endif
	</div>
    </div>
@endsection
