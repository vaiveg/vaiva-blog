<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Create a new TagController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
}
