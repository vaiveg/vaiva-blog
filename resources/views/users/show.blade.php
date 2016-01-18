@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
	    <!-- Current User -->
            <div class="panel panel-default">
            	<div class="panel-heading">
                    {{ $user->username }}
		</div>
                <div class="panel-body">
                    <table class="table table-striped user-table">
			<tbody>
			    <tr>
				<th>Name</th>
				<td>{{ $user->name }}</td>
			    </tr>
                            <tr>
                                <th>Surname</th>
                                <td>{{ $user->surname }}</td>
                            </tr>
                            <tr>
                        	<th>Email</th>
                                <td>{{ $user->email }}</td>
			    </tr>
			</tbody>
		    </table>
		</div>
	    </div>

	    <!-- Current Posts -->
            @if (count($posts) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User's Posts
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
                                        <td>
                                            <form action="/posts/{{ $post->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-post-{{ $post->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
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
