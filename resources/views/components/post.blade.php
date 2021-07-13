
@foreach ($Posts as $Post)

	<div class="shadow col-md-8 row fs-5 mt-5 p-3 bg-white rounded">

				<div class="col-md-12 pb-4">	
					<div class="row">
						<div class="col-2">
							<img class="rounded-circle border border-2" src="{{asset('img/No_photo.png')}}" alt="foto do perfil" width="70px" height="70px">
						</div>
						
						<div class="col-6 ms-3 fs-5">
							<strong>
								<a class="text-dark text-decoration-none" href="{{route ('user.show', ['id' => $Post->user_id]) }}">{{$Post->user->name}}</a>
								<br>
								<sup>{{date('H:i', strtotime ($Post->updated_at))}} h</sup>
							</strong>
						</div>

	 					@if(Auth::user()->id == $Post->user_id)

							<div class="col-3">
								<form action="{{route('post.destroy', ['id' => $Post->id])}}" method="POST">
						    		@csrf
						    		@method('DELETE')
						    		<button class="btn border rounded-pill shadow w-100 mb-2" type="submit">Apagar</button>
						    		<button class="btn border rounded-pill shadow w-100" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$Post->id}}" data-bs-whatever="@mdo">Editar</button>
						    	</form>
							</div>
						    	
						@endif

						<p class="mt-3 mb-0">{{$Post->content}}</p>
					</div>
				</div>

				<hr>

			@if($Post->image == 'false')

			@else
			<a data-bs-toggle="modal" data-bs-target="#exampleModal2-{{$Post->id}}">
				<div class="mt-2 mb-3">
					<img src="/storage/app/{{$Post->image}}" alt="Foto da Postagem" width="100%">
				</div>
			</a>

				<hr>

			@endif
				<div class="col-md-12 row mb-2">
					<button class="border-0 col bg-white pb-2"><i class="bi bi-heart"></i> Amei</button>
					<button class="border-0 col bg-white pb-2"><i class="bi bi-share-fill"></i> Compartilhar</button>		
				</div>


				<div class="background-comment rounded p-2 border">


					@if($Comments->where('post_id', '=', $Post->id))
						<p class="m-0">{{$Comments->where('post_id', '=', $Post->id)->count()}} Comentários</p>
						<br>
					@endif

					@foreach($Comments as $Comment)
					@if($Post->id == $Comment->post_id)

						<a href="{{route ('user.show', ['id' => $Post->user_id]) }}" class="fw-bold text-decoration-none text-dark">{{$Comment->user->name}}</a>
						<p class="rounded-pill bg-light shadow p-1 mb-1">{{$Comment->content}}</p>

					<div class="d-flex mb-2">

					<button class="btn">
						<span class="me-2 d-flex flex-column justify-content-center">
							<sub class="fw-bold mb-2">{{date('H:i', strtotime ($Comment->updated_at))}} h</sub>
						</span>	
					</button>			

						@if(Auth::user()->id == $Comment->user_id)
							<form action="{{route('comment.destroy', ['id' => $Comment->id])}}" method="POST">
					    		@csrf
					    		@method('DELETE')
					    		<button class="btn p-1" type="submit">Apagar</button>	
					    	</form>
						    
						    <button class="btn p-1 ms-2" data-bs-toggle="modal" data-bs-target="#commentModal-{{$Comment->id}}" data-bs-whatever="@mdo">Editar</button>	
						@endif

					</div>


					@if($Comments->where('post_id', '=', $Post->id)->count() > 2)
						@break
					@endif

					@endif
					@endforeach

						@if($Comments->where('post_id', '=', $Post->id)->count() > 2)
							<a href="" class="text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal2-{{$Post->id}}">Ver mais</a>
						@endif

					<form action="{{route ('comment.create') }}" method="POST">
						@csrf
						<input type="hidden" name="post_id" value="{{$Post->id}}">
						<input class="rounded-pill shadow bg-white col-12" type="text" name="content" placeholder="Comente!">
					</form>

				</div>



		</div>
		
@endforeach