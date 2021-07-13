@extends('layout.dashboard')

@section('titulo', 'Perfil')

@section('content')

<div class="col-lg-9 mt-3 fs-5 overflow-auto row justify-content-center">
	<div class="row">
		<div class="col-md-12 d-flex">
			<div>
				<img class="mainPerfil shadow rounded-circle border border-2 me-4" src="{{asset('img/No_photo.png')}}" alt="Foto de perfil">
			</div>
			<div class="fs-2 mt-3"><h1 class="placeholder-sm">{{$Users->name}}</h1></div>
		</div>
	</div>



@foreach ($Posts as $Post)

	<div class="shadow col-lg-9 col-md-12 row fs-5 mt-5 p-0 bg-white rounded">

				<div class="col-md-12 p-3">	
					<div class="row">
						<div class="col-2">
							<img class="perfil rounded-circle border border-2" src="{{asset('img/No_photo.png')}}" alt="foto do perfil">
						</div>
						
						<div class="col-6 ms-3 fs-5">
							<strong>
								<a class="text-dark text-decoration-none" href="{{route ('user.show', ['id' => $Post->user_id], app()->getLocale())}}">{{$Post->user->name}}</a>
								<br>
								<sup>{{date('H:i', strtotime ($Post->updated_at))}} h</sup>
							</strong>
						</div>

	 					@if(Auth::user()->id == $Post->user_id)

							<div class="col-3">
								<form action="{{route('post.destroy', ['id' => $Post->id], app()->getLocale())}}" method="POST">
						    		@csrf
						    		@method('DELETE')
						    		<button class="placeholder-sm bg-white border rounded-pill shadow w-100 mb-2" type="submit">{{__ ('Delete')}}</button>
						    	</form>
						    	<button class="placeholder-sm bg-white border rounded-pill shadow w-100" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$Post->id}}" data-bs-whatever="@mdo">{{__ ('Edit')}}</button>
							</div>
						    	
						@endif

						<p class="mt-3 mb-0">{{$Post->content}}</p>
					</div>
				</div>

				<hr>

			@if($Post->image == 'false')

			@else
			<a class="p-0" data-bs-toggle="modal" data-bs-target="#exampleModal2-{{$Post->id}}">
				<div class="mt-2 mb-3">
					<img src="/storage/app/{{$Post->image}}" alt="Foto da Postagem" width="100%">
				</div>
			</a>

				<hr>

			@endif
				<div class="col-md-12 row mb-2">
					<button class="border-0 col bg-white pb-2 placeholder-sm"><i class="bi bi-heart"></i> {{__ ('Like')}}</button>
					<button class="border-0 col bg-white pb-2 placeholder-sm"><i class="bi bi-share-fill"></i> {{__ ('Share')}}</button>		
				</div>


				<div class="background-comment rounded p-2 border">


					@if($Comments->where('post_id', '=', $Post->id))
						<p class="m-0">{{$Comments->where('post_id', '=', $Post->id)->count()}} {{__ ('Comments')}}</p>
						<br>
					@endif

					<div class="col-none">

					@foreach($Comments as $Comment)
					@if($Post->id == $Comment->post_id)

						<a href="{{route ('user.show', ['id' => $Post->user_id], app()->getLocale()) }}" class="fw-bold text-decoration-none text-dark">{{$Comment->user->name}}</a>
						<p class="rounded-pill bg-light shadow p-1 mb-1">{{$Comment->content}}</p>

					<div class="d-flex mb-2">

					<button class="btn">
						<span class="me-2 d-flex flex-column justify-content-center">
							<sub class="fw-bold mb-2">{{date('H:i', strtotime ($Comment->updated_at))}} h</sub>
						</span>	
					</button>			

						@if(Auth::user()->id == $Comment->user_id)
							<form action="{{route('comment.destroy', ['id' => $Comment->id], app()->getLocale())}}" method="POST">
					    		@csrf
					    		@method('DELETE')
					    		<button class="btn p-1" type="submit">{{__ ('Delete')}}</button>	
					    	</form>
						    
						    <button class="btn p-1 ms-2" data-bs-toggle="modal" data-bs-target="#commentModal-{{$Comment->id}}" data-bs-whatever="@mdo">{{__ ('Edit')}}</button>	
						@endif

					</div>


					@if($Comments->where('post_id', '=', $Post->id)->count() > 2)
						@break
					@endif

					@endif
					@endforeach

						@if($Comments->where('post_id', '=', $Post->id)->count() > 2)
							<a href="" class="text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal2-{{$Post->id}}">{{__ ('Load More')}}</a>
						@endif

					</div>
						@if($Comments->where('post_id', '=', $Post->id)->count() > 0)
							<a href="" class="col-none-lg text-secondary text-decoration-none mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal2-{{$Post->id}}">Ver comentários</a>
						@endif


					<form action="{{route ('comment.create'), app()->getLocale() }}" method="POST">
						@csrf
						<input type="hidden" name="post_id" value="{{$Post->id}}">
						<input class="placeholder p-1 rounded-pill shadow bg-white col-12" type="text" name="content" placeholder="{{__ ('Write')}}">
					</form>

				</div>
	</div>


								<div class="modal fade" id="exampleModal-{{$Post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">{{__ ('Edit')}}</h5>
								        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								      </div>
								      <div class="modal-body">
								        <form class="row bg-white rounded p-4" action="{{route ('post.edit', ['id' => $Post->id], app()->getLocale()) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
											@csrf
											<input class="border-1 col-md-12 rounded-pill bg-white mt-1 p-1" type="text" name="content" placeholder="{{__ ('Write')}}">
											<div class="col-md-6">
											  <input type="file" name="image" class="form-control rounded-pill bg-white border-1 mt-3 mb-2">
											</div>
											
											<button class="border-1 col-md-6 bg-white rounded-pill mt-3 mb-2">
												<i class="bi bi-emoji-smile"></i> Emojis</button>

												<hr>

											<div class="row mt-1 justify-content-around">
										        <button type="button" class="btn btn-secondary col-md-4" data-bs-dismiss="modal">{{__ ('Close')}}</button>
										        <button type="submit" class="btn btn-primary col-md-4">{{__ ('Confirm')}}</button>
										    </div>
										</form>
								      </div>
								    </div>
								  </div>
								</div>

								<div class="modal fade p-0" id="exampleModal2-{{$Post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-fullscreen">
								    	<div class="modal-content">
											<div class="modal-body p-0">
											  <div class="container-fluid">
												    <div class="row vh-100">
												    	<div class="col-lg-9 d-flex align-items-center justify-content-center bg-dark p-0 mh-100">
												    		@if($Post->image != 'false')
											    			<img class="mw-100 mh-100" src="/storage/app/{{$Post->image}}">
											    				@else
											    				<h1 class="text-white">{{__ ('no file selected')}}</h1>
											    			@endif
												    	</div>
												    	<div class="col-lg-3 col-md-12 d-flex flex-column">
												    		<header class="modal-header justify-content-center">
												    			<h3>{{__ ('Comments')}}</h3>
												    			<button type="button" class="p-4 col-none btn-close fixed-top" data-bs-dismiss="modal" aria-label="Close"></button>
												    		</header>
												    		
												    		<main class="modal-body overflow-auto">

												    		@foreach($Comments as $Comment)
												    		@if($Post->id == $Comment->post_id)
												    			<div class="d-flex justify-content-between">
													    			<a class="text-decoration-none text-dark fw-bold mt-2">
													    				{{$Comment->user->name}}
													    			</a>
														    			@if(Auth::user()->id == $Comment->user_id)
																			<div class="d-flex">
																				<form action="{{route('comment.destroy', ['id' => $Comment->id], app()->getLocale())}}" method="POST">
																		    		@csrf
																		    		@method('DELETE')
																		    		<button class="placeholder-sm border-0 bg-transparent p-1 m-0" type="submit">{{__ ('Delete')}}</button>	
																		    	</form>
																			    
																			    <button class="placeholder-sm border-0 bg-transparent p-1 ms-2 mt-0" data-bs-toggle="modal" data-bs-target="#commentModal-{{$Comment->id}}" data-bs-whatever="@mdo">{{__ ('Edit')}}</button>	
																			</div>
																		@endif
																</div>
													    			<p class="bg-light bg-gradient rounded-pill p-2 m-0">
													    				{{$Comment->content}}
													    			</p>
												    		@endif
												    		@endforeach				

												    		</main>
												    		
												    		<footer class="modal-footer d-flex justify-content-center">
												    			<form action="{{route ('comment.create'), app()->getLocale() }}" method="POST">
												    				@csrf
																	<input type="hidden" name="post_id" value="{{$Post->id}}">
																	<input class="placeholder p-1 rounded-pill shadow bg-white col-12" type="text" name="content" placeholder="{{__ ('Write')}}">
												    			    <button type="button" class="btn btn-primary col-none-lg w-100 mt-2 rounded-pill" data-bs-dismiss="modal" aria-label="Close">{{__ ('Close')}}</button>
												    			</form>
												    		</footer>
												    	</div>
												    </div>
											  </div>
											</div>
										</div>
									</div>
								</div>

								@foreach ($Comments as $Comment)
								<div class="modal fade" id="commentModal-{{$Comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								
								  <div class="modal-dialog modal-dialog-centered">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">{{__ ('Edit')}}</h5>
								        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								      </div>
								      <div class="modal-body">
								        <form class="row bg-white rounded p-4" action="{{route ('comment.edit', ['id' => $Comment->id], app()->getLocale()) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
											@csrf
											<input class="border-1 col-md-12 rounded-pill bg-white mt-1 p-1 mb-2" type="text" name="content" placeholder="Editar comentário">
												<hr>

											<div class="row mt-1 justify-content-around">
										        <button type="button" class="btn btn-secondary col-md-4" data-bs-dismiss="modal">{{__ ('Close')}}</button>
										        <button type="submit" class="btn btn-primary col-md-4">{{__ ('Confirm')}}</button>
										    </div>
										</form>
								      </div>
								    </div>
								  </div>
								</div>

@endforeach								
@endforeach				

		
		</div>
	</div>
</div>











@endsection