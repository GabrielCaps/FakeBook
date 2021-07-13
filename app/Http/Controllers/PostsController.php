<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Support\Facades\Validator;
use Storage;

class PostsController extends Controller
{
   

	public function store(PostsRequest $request, Posts $posts) 
	{
		  
		$this->validate($request, [
		        'image' => 'max:10000',
		]);


		if($request->hasFile('image') && $request->image->isValid()) 
		{
			
			$imgUrl = $request->image->store('posts');

			$data = new Posts;
			$data->content = $request->content;
			$data->image = $imgUrl;
			$data->user_id = auth()->user()->id;
			$data->save();
			
		}
		else {
			$data = new Posts;
			$data->content = $request->content;
			$data->image = 'false';
			$data->user_id = auth()->user()->id;
			$data->save();
		}
		return back();
	}

	public function destroy ($id, $language) 
	{

			$data = Posts::find($language);

			if($data->image)
			{
				Storage::delete($data->image);

			}

			$data->delete();

			return back()->with('msg', 'Publicação apagada com sucesso');

	}

	public function edit ($id, PostsRequest $request, $language)
	{

			$data = Posts::find($language);
			$data->content = $request->content;
			$data->image = 'false';
			$data->user_id = auth()->user()->id;
			$data->save();


			if($request->hasFile('image') && $request->image->isValid()) 
		{
			
			$imgUrl = $request->image->store('posts');

			$data = Posts::find($language);
			$data->content = $request->content;
			$data->image = $imgUrl;
			$data->user_id = auth()->user()->id;
			$data->save();
			
		}


			return back()->with('msg', 'Publicação editada com sucesso');;

	}

}
