@csrf

<div class="form-group">
    <label for="name">Nombre</label>
    <input type="input" class="form-control" id="name" name="name" placeholder="Ingrese su nombre" value="{{ $usuario->name ?? old('name') }}">
    {!! $errors->first('name', '<<span class=error>:message</span>') !!}
</div>

<div class="form-group">
    <label for="email">Correo</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ $usuario->email ?? old('email') }}">
    {!! $errors->first('email', '<<span class=error>:message</span>') !!}
</div>

<div class="form-group">
    <label for="address">Dirección</label>
    <input type="input" class="form-control" id="address" name="address" placeholder="Dirección de residencia" value="{{ $usuario->address ?? old('address') }}">
    {!! $errors->first('address', '<span class=error>:message</span>') !!}
</div>

<div class="form-group">
    <label for="phone">Teléfono</label>
    <input type="input" class="form-control" id="phone" name="phone" placeholder="Teléfono móvil preferiblemente" value="{{ $usuario->phone ?? old('phone') }}">
    {!! $errors->first('phone', '<span class=error>:message</span>') !!}
</div>

@unless($usuario->id) {{-- si no tiene user_id…  --}}
    <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña..." value="{{ $usuario->password }}">
            {!! $errors->first('password', '<span class=error>:message</span>') !!}
    </div>

    <div class="form-group">
            <label for="password_confirmation">Confirme la contraseña</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Reingrese la contraseña" value="{{ $usuario->password }}">
            {!! $errors->first('password_confirmation', '<span class=error>:message</span>') !!}
    </div>
@endunless

<div class="checkbox">
    Privilegios:
    @foreach ($roles as $id => $nombre)
        <label>
            &nbsp;&nbsp;
            <input type="checkbox" name="roles[]" value="{{ $id }}" 
                {{ $usuario->roles->pluck('id')->contains($id) ? 'checked' : '' }}
            >
            {{ $nombre }}
        </label>
    @endforeach
</div>
{!! $errors->first('roles', '<span class=error>:message</span>') !!}
<hr>