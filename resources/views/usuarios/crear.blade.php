@extends('plantilla')

@section('titulo', 'Usuario')

@section('contenido')
	<div class="container">	
		<br>
		<h3>Crear usuarios</h3>
		<br>
		
		@if (session()->has('info'))
			<div class="alert alert-success">{{ session('info') }}</div>
		@endif

		<form method="post" action={{ route('usuarios.store') }}>
			{{-- si no se pasa la nueva instancia de User, fallará la carga. Ver la razón en form.blade.php --}}
			@include('usuarios.form', ['usuario' => new App\User])
			<button type="submit" class="btn btn-primary">Guardar</button>
		</form>	
	</div>

@endsection