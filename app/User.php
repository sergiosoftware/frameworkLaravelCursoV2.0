<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Define una relacion Eloquen entre el usuario y los roles
     * Se retorna la relación a la que pertenece
     */
    public function roles() {
        // belongsToMany puede recibir un segundo parámetro con el nombre del pivote si este no se creo usando la convención
        return $this->belongsToMany(Role::class)->withTimestamps(); // muchos a muchos
    }

    public function hasRoles(array $roles) {
        // foreach ($roles as $role) {
        //     foreach ($this->roles as $userRole) {
        //         // se compara cada rol recibido como argumento, con uno de los roles de usuario
        //         if ($userRole->nombre === $role) {
        //             return true;
        //         }
        //     }
        // }
        // return false;
        // lo anterior equivale a lo siguiente:
        return $this->roles->pluck('nombre')->intersect($roles)->count();
    }

    public function isAdmin() {
        return $this->hasRoles(['Administrador']);
    }

    /**
     * Se retornará un objeto con los atributos necesarios para
     * procesar los mensajes relacionados con un usuario
     */
    public function messages() {
        // se puede cambiar a hasOnMessage::class); de ser necesario
        // dd($this->hasMany(Mensaje::class));
        return $this->hasMany(Mensaje::class);
    }

    public function nota() { // <-- un nombre cualquiera
        // se puede usar morphOne/morphMany
        return $this->morphOne(Nota::class, 'anotacion'); // param2 = llave o prefijo, ver migración: $table->integer('anotacion_id')->unsigned();
    }

    public function etiquetas() {
		return $this->morphToMany(Etiqueta::class, 'etiquetable')->withTimestamps(); // <-- forzar registrar created_at y updated_at
	}
}