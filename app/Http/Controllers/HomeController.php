<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comm = new Comments();
		$comments=dd($comm->find(1)->pluck('description'));
		
		//$comments=$comments['description'];
		$comments='jopa';
		return view('user')->with('comments', $comments);
    }
}
