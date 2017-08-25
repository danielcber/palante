@extends('layouts.master')

@section('content')
	<br>
	<div class="container">
		<div class="row">
			<div class="evento col-xs-12 col-md-12 col-md-8 col-lg-8">
				<h2>
					{{ $evento->titulo }}
				</h2>
				<h5>
					Organizado por {{ $evento->user->name }}
				</h5>
				<p>
					{{ $evento->descripcion }}
				</p>
			</div>
			<div class="barrita col-xs-12 col-md-12 col-md-4 col-lg-4" style="background-color: #F7F7F7; ">
				
				<p>
				<strong>PRECIO</strong><br>
				<?php 
				$precio = $evento->entradaprecio;
				if ($precio == 0) {
					echo "Gratis";
				}
				else {
					echo "BsF. ".number_format($precio, 2, ',', '.');
				}
				 ?>
				</p>

				@include('eventos.fecha')
				
				<p>
				<strong>UBICACION</strong><br>
				{{ $evento->ubicacion }}
				</p>

			</div>
		</div>
	</div>



	<div class="container">
			<h5>Comentarios</h5>
					
			<form method="POST" action="/eventos/{{ $evento->id}}/comentarios">
			{{ csrf_field() }}
				<div class="form-group">
					<textarea class="form-control" name="comentario" placeholder="Cuéntanos de tu experiencia!" required></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Crear comentario</button>
				</div>
			</form> @include('layouts.errors')

			<br>
			
			<ul class="list-group">
			@foreach ($evento->comentarios as $comentario)

				<li class="list-group-item">
					<strong>{{$comentario->user->name }} comentó {{ $comentario->created_at->diffForHumans() }}: &nbsp;</strong>
					{{ $comentario->comentario }}
				</li>

			</ul>

				@endforeach
	</div>
@endsection