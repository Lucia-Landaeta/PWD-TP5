<?php
class Usuario extends Model{
    public static $_id_column = 'idUsuario';

    public function roles(){
        return $this->has_many_through('Rol', 'UsuarioRol', 'idUsuario', 'idRol');
    }
}