<?php

/** IMPORTANTE**/
//Cargar Modelos necesarios BBDD
include_once 'model/Resena.php';
include_once 'model/ResenaDAO.php';
/** IMPORTANTE**/
//Instala la extensión Thunder Client en VSC. Te permite probar si tu API funciona correctamente.


class APIController{    
 
    public function api(){
       
        if($_POST["accion"] == 'consultaReseñas'){

            $reseñas = ResenaDAO::getAllReseñas();
            
            //Array asociativo para poder encodear el json
            $reseñasAsoc = [];
            foreach ($reseñas as $reseña) {
                $reseñasAsoc [] = [
                    'reseña_id' => $reseña->getReseña_id(),
                    'usuario_id' => $reseña->getUsuario_id(),
                    'comentario' => $reseña->getComentario(),
                    'valoracion' => $reseña->getValoracion(),
                    'nombre_usuario' => $reseña->getNombre_usuario(),
                ];

            }
            echo json_encode($reseñasAsoc, JSON_UNESCAPED_UNICODE); 
            return; //return para salir de la funcion

        }else if($_POST["accion"] == 'nuevaReseña'){
            
            session_start();
            $usuario_id = $_SESSION['usuario']->getUsuario_id();
            $nombre_usuario = $_SESSION['usuario']->getNombre();

            $json = file_get_contents('php//input');
            $data = json_decode($json, true);

            //Comprobar los datos
            if (isset($data['comentario']) && isset($data['valoracion']) && isset($data['pedido_id'] )) {
                $comentario = $data['comentario'];
                $valoracion = $data['valoracion'];
                $pedido_id = $data['pedido_id'];

                ResenaDAO::insertarReseña($usuario_id, $pedido_id, $comentario, $valoracion, $nombre_usuario);

                echo "se ha insertado";
            }else{
                echo "faltan datos";
            }

            
            return;
        }
    }
}