<?php

Class GestorFechas{

    public static function crearFechaFormateada(){       
        date_default_timezone_set('Europe/Madrid');
 
        $fecha = date('Y-m-d H:i:s');

        return $fecha;
    }
}