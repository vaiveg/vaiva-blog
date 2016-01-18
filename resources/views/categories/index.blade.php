@extends('layouts.app')

@section('content')
    <div class="container">
	<div class="col-sm-offset-2 col-sm-8">
	    @if (Auth::user())
		<div class="panel panel-default">
		    <div class="panel-heading">
			New Category
		    </div>

		    <div class="panel-body">
			<!-- Display Validation Errors -->
			@include('common.errors')

			<!-- New Category Form -->
			<form action="/categories" method="POST" class="form-horizontal">
			    {{ csrf_field() }}

			    <!-- Category Title -->
			    <div class="form-group">
				<label for="category-title" class="col-sm-3 control-label">Title</label>

				<div class="col-sm-6">
				    <input type="text" name="title" id="category-title" class="form-control" value="{{ old('title') }}">
				</div>
			    </div>

			    <!-- Add Category Button -->
			    <div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
				    <button type="submit" class="btn btn-default">
					<i class="fa fa-btn fa-plus"></i>Add Category
				    </button>
				</div>
			    </div>
			</form>
		    </div>
	        </div>
	    @endif

	    <!-- Current Categories -->
	    @if (count($categories) > 0)
		<div class="panel panel-default">
		    <div class="panel-heading">
			Current Categories
		    </div>

		    <div class="panel-body">
			<table class="table table-striped category-table">
			    <thead>
				<th>Category</th>
				<th>&nbsp;</th>
			    </thead>
			    <tbody>
				@foreach ($categories as $category)
				    <tr>
					<td class="table-text"><div><a href="/categories/{{ $category->id }}">{{ $category->title }}</a></div></td>

					<!-- Task Delete Button -->
					@if (Auth::user() && Auth::user()->type === 'admin')
					    <td>
						<form action="/categories/{{ $category->id }}" method="POST">
						    {{ csrf_field() }}
						    {{ method_field('DELETE') }}

						    <button type="submit" id="delete-category-{{ $category->id }}" class="btn btn-danger">
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
