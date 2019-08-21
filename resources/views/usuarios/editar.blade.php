@extends('plantilla')

@section('titulo', 'Usuario')

{{-- @section('contenido')
<div class="container">
    <h1>Editar usuarios</h1>
    
    @if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif

	<form method="post" action={{ route('usuarios.update', $usuario->id) }}>
		@csrf
        {!! method_field('PUT') !!}
		<div class="form-group">
			<label>Nombre</label>
			<input name="name" class="form-control" placeholder="Nombre..." value="{{ $usuario->name }}">
			{!! $errors->first('name', '<small>:message</small>') !!} 
		</div>		
		<div class="form-group">
			<label>Correo</label>
			<input type="email" name="email" class="form-control" placeholder="Correo..." value="{{ $usuario->email }}">
			{!! $errors->first('email', '<small>:message</small>') !!} 	
		</div>
		<div class="form-group">
			<label>Dirección</label>
			<input name="address" class="form-control" placeholder="Dirección..." value="{{ $usuario->address }}">
			{!! $errors->first('address', '<small>:message</small>') !!} 	
		</div>        
		<div class="form-group">
			<label>Teléfono</label>
			<input name="phone" class="form-control" placeholder="Teléfono..." value="{{ $usuario->phone }}">
			{!! $errors->first('phone', '<small>:message</small>') !!} 
		</div>        
		<div class="form-group">
			<button class="btn btn-success">Enviar</button>	
		</div>
		
	</form>	
</div>
@endsection --}}
@section('contenido')
<div class="container">
	<br>
	<h3>Editar usuarios</h3>
	<br>
    
    @if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif

	<form method="post" action={{ route('usuarios.update', $usuario->id) }}>
		{!! method_field('PUT') !!}
		@include('usuarios.form')
		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>	
</div>
@endsection