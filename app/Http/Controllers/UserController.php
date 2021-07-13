<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\User;

class UserController extends Controller
{
    public function show ($id, $language)
    {

    	$Post = Posts::all();
        $Users = User::find($language);
        $Posts = $Post->where('user_id', '=', $Users->id);
    	$Comments = Comments::all();



    	return view ('dashboard.profile', compact('Posts', 'Users', 'Comments'));
    }
}
