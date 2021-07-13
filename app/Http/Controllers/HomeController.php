<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Support\Facades\App;

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
    public function index ()
    {

        $Posts = Posts::inRandomOrder()->paginate(8);
        $Comments = Comments::latest()->paginate(15);

        return view ('dashboard', ['Posts' => $Posts], ['Comments' => $Comments]);
    }

}
