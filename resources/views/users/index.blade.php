@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
	    <!-- Current User -->
            @if (count($users) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Users
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped user-table">
                            <thead>
                                <th>User</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="table-text"><div><a href="/users/{{ $user->id }}">{{ $user->username }}</a></div></td>

                                        <!-- User Delete Button -->
                                        @if (Auth::user()->type === 'admin')
					    <td>
                                        	<form action="/users/{{ $user->id }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" id="delete-user-{{ $user->id }}" class="btn btn-danger">
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
