<?php

/** IMPORTANTE**/
//Cargar Modelos necesarios BBDD
include_once 'model/Resena.php';
include_once 'model/ResenaDAO.php';

class APIController{    

    public function consultaReseñas(){

        $reseñas = ResenaDAO::getAllReseñas();

        //Array asociativo para poder encodear el json
        $reseñasAsoc = [];
        foreach ($reseñas as $reseña) {
            // Obtener el valor de usuario_id
            $usuario_id = $reseña->getUsuario_id();

            $nombre_usuario = ResenaDAO::getNombreUsuario($usuario_id);  

            $reseñasAsoc [] = [
                'reseña_id' => $reseña->getReseña_id(),
                'usuario_id' => $reseña->getUsuario_id(),
                'comentario' => $reseña->getComentario(),
                'valoracion' => $reseña->getValoracion(),
                'nombre_usuario' => $nombre_usuario,
            ];

        }
        
        echo json_encode($reseñasAsoc, JSON_UNESCAPED_UNICODE); 
        return; //return para salir de la funcion
    }

    public function addResena(){

        //Comprobar los datos
        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, TRUE); //convert JSON into array

        if (isset($data['comentario']) && isset($data['valoracion']) && isset($data['pedido_id']) && isset($data['usuario_id'])) {
            $comentario = $data['comentario'];
            $valoracion = $data['valoracion'];
            $pedido_id = $data['pedido_id'];
            $usuario_id = $data['usuario_id'];

            ResenaDAO::insertarReseña($usuario_id, $pedido_id, $comentario, $valoracion);

            echo "se ha insertado";
        }else{
            echo "faltan datos";
        }
    }

    public function consultaReseña(){

        //Comprobar los datos
        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, TRUE); //convert JSON into array
        
        if (isset($data['pedido_id']) && isset($data['usuario_id'])){
            $pedido_id = $data['pedido_id'];
            $usuario_id = $data['usuario_id'];
            
            $reseña = ResenaDAO::getDatosReseña($pedido_id);

            //Array asociativo para poder encodear el json
            $reseñasAsoc = [];

            $nombre_usuario = ResenaDAO::getNombreUsuario($usuario_id);  

            $reseñasAsoc [] = [
                'reseña_id' => $reseña->getReseña_id(),
                'usuario_id' => $reseña->getUsuario_id(),
                'comentario' => $reseña->getComentario(),
                'valoracion' => $reseña->getValoracion(),
                'nombre_usuario' => $nombre_usuario,
            ];
            
            echo json_encode($reseñasAsoc, JSON_UNESCAPED_UNICODE); 
            return; //return para salir de la funcion
        }    
    }
}