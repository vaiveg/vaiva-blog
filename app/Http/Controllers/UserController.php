<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * The user repository instance.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new UserController instance.
     *
     * @param UserRepository $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->middleware('auth');

	$this->users = $users;
    }

    /**
     * Display a list of all of the users.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('users.index', [
            'users' => $this->users->allUsers(),
        ]);
    }

    /**
     * Show the given user profile.
     *
     * @param  Request  $request
     * @param  string $userId
     * @return Response
     */
    public function show(Request $request, $userId)
    {
	return view('users.show', [
            'user' => $this->users->userInfo($userId),
	    'posts' => $this->users->userPosts($userId),
        ]);
    }

    /**
     * Destroy the given user.
     *
     * @param  Request  $request
     * @param  string $userId
     * @return Response
     */
    public function destroy(Request $request, $userId)
    {
	$user = User::find($userId);
        $this->authorize('destroy', $user);
        $user->destroy($userId);

        return redirect('/users');
    }

}
