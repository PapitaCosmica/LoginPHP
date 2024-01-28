<?php 
class EnlacesPaginas{
    public static function enlacesPaginasModel($enlacesModel){
        if($enlacesModel == "ingresar" or $enlacesModel == "servicios" or $enlacesModel == "contacto" or $enlacesModel == "registro" or $enlacesModel == "Bienvenido" or $enlacesModel == "salir") {
            $module="View/modules/".$enlacesModel.".php";
        }elseif($enlacesModel=="index") {
            $module="View/modules/Inicio.php";
        }

        else {
        $module="View/modules/Inicio.php"; }
        return $module;
    }
}
?>