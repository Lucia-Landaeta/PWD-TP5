<?php
class Rol extends Model{
    public static $_id_column = 'idRol';

    public function usuarios(){
        return $this->has_many_through('Usuario', 'UsuarioRol', 'idRol', 'idUsuario');
    }
}