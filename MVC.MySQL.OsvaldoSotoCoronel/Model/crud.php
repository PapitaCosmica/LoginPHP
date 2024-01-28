<?php
require_once "conexion.php";

class Datos extends Conexion {
    public static function registrarUsuarioModel($datosModel, $tabla) {
        $str = Conexion::conectar();
        $st = $str->prepare("INSERT INTO $tabla (usuario, password, correo) VALUES (:usuario, :password, :email)");
        $st->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $st->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $st->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

        if ($st->execute()) {
            $_GET["id"] = $str->lastInsertId();
            return "ok";
        } else {
            return "Error";
        }
    }

    public static function ingresoUsuarioModel($datosModel, $tabla) {
        $st = Conexion::conectar()->prepare("SELECT usuario, password, correo FROM $tabla WHERE correo = :email AND password = :password");
        $st->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $st->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $st->execute();
        
        if ($st->rowCount() == 1) {
            return $st->fetch();
        } else {
            return false;
        }
    }
}
?>
