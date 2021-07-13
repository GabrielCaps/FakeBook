<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class CommentsController extends Controller
{
    


	public function store(Request $request) 
	{

		$Comments = new Comments;
		$Comments->content = $request->content;
		$Comments->post_id = $request->post_id;
		$Comments->user_id = auth()->user()->id;
		$Comments->save();

		return back();

	}

	public function destroy($id, $language) 
	{

		Comments::destroy($language);
		return back();


	}


	public function edit(Request $request, $id, $language){

		$data = Comments::find($language);
		$data->content = $request->content;
		$data->save();

		return back();


	}

}
