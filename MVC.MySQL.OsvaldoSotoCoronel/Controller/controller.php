<?php
include "model/model.php";
include "model/crud.php";

class MVCController {
    public function getTemplate() {
        include "View/template.php";
    }

    public function enlacesPaginasController() {
        if (isset($_GET['action'])) {
            $enlacesController = $_GET['action'];
        } else {
            $enlacesController = "index";
        }
        $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
        include $respuesta;
    }

    public function registroUsuarioController() {
        if (isset($_POST["usuarioRegistro"])) {
            $datosController = array(
                "usuario" => $_POST["usuarioRegistro"],
                "password" => $_POST["passwordRegistro"],
                "email" => $_POST["emailRegistro"]
            );

            $respuesta = Datos::registrarUsuarioModel($datosController, "usuarios");

            if ($respuesta == "ok") {
                header("location: index.php?action=ingresar&id=" . $_GET["id"]);
            } else {
                echo "Error al registrar";
            }
        }
    }

    public function ingresoUsuarioController() {
        if (isset($_POST["usuarioIngresar"])) {
            $datosController = array(
                "usuario" => $_POST["usuarioIngresar"],
                "password" => $_POST["passwordIngresar"],
                "email" => $_POST["correoIngresar"]
            );

            $respuesta = Datos::ingresoUsuarioModel ($datosController, "usuarios");

        if (isset($respuesta["usuario"])) {
            if ($respuesta["usuario"] == $_POST["usuarioIngresar"]&& $respuesta["password"]==$_POST["passwordIngresar"]) {
                echo "exito";
             session_start();
             $_SESSION["validar"] = true;
             $_SESSION["usuario"] = $respuesta["usuario"];
             echo $_SESSION["usuario"];
             header("location:index.php?action=Bienvenido");
        }
        }else{
            echo "error usuario";
        }
          //  if ($respuesta["usuario"] == $_POST["usuarioIngresar"]&& $respuesta["password"]==$_POST["passwordIngresar"]) {
           //    echo "exito";
            //} else {
             //  echo"usuario o contraseña incorercta";
            //}
        }
    }
}
?>
