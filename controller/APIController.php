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

        }//else if($_POST["accion"] == 'add_review'){

            // $id_pedido = json_decode($_POST["pedido"]); //se decodifican los datos JSON que se reciben desde JS
            // $id_usuario = json_decode($_POST["id_usuario"]); //se decodifican los datos JSON que se reciben desde JS
            
            // /*

            //     Otras operaciones

            // */
            
            // //si solo quieres devolver un pequeño mensaje, simplemente puedes hacer un echo de texto
            // echo "Bienvenido Pedrito";
            // return;
        //}
    }
}