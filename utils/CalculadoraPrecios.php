<?php

Class CalculadoraPrecios{

    public static function calcularPrecioPedido($pedidos){
        // Calcula el precio total de los pedidos sumando los precios individuales
        $precioTotal = 0;
        foreach ($pedidos as $pedido){
            $precioTotal += $pedido->calculaPrecioCantidad();
        }
        return $precioTotal;        
    }
    
    public static function formatPrecios($precio){
        // Formatea el precio con una coma y un punto como separadores
        $precio_formateado = number_format($precio, 2, ',', '.');
        
        // Obtiene la parte entera y decimal del precio formateado
        $pos_coma = strpos($precio_formateado, ',');
        $parte_entera = substr($precio_formateado, 0, $pos_coma);
        $parte_decimal = substr($precio_formateado, $pos_coma + 1);
        
        // Retorna el precio formateado con un apóstrofe como separador entre la parte entera y la decimal
        return "$parte_entera'$parte_decimal";
    }
    
    public static function subtotalSinIVA($pedidos){
        // Calcula el precio total sin incluir el IVA
        $precio = self::calcularPrecioPedido($pedidos);
        $porcentajeIVA = 21; // Porcentaje de IVA (ejemplo: 21%)
        
        // Calcula el precio sin IVA
        $precioSinIVA = $precio / (1 + ($porcentajeIVA / 100));
        return $precioSinIVA;
    }
    
    public static function IVA($pedidos){
        // Calcula el monto total del IVA aplicado a los pedidos
        $precioConIVA = self::calcularPrecioPedido($pedidos);
        $precioSinIVA = self::subtotalSinIVA($pedidos);
        
        // Calcula solo el monto del IVA
        $IVA = $precioConIVA - $precioSinIVA;
        return $IVA;
    }
    
    public static function calcularPuntosPedido($pedidos){
        // Calcula el precio total de los pedidos sumando los precios individuales
        $puntos = 0;
        foreach ($pedidos as $pedido){
            $puntos += $pedido->calculaPrecioCantidad() * 100;
        }
        return $puntos;        
    }

    public static function formatPuntos($puntos){
        // Formatea el precio con una coma y un punto como separadores
        $puntos_formateados = number_format($puntos, 2, ',', '.');
        
        // Obtiene la parte entera y decimal del precio formateado
        $pos_coma = strpos($puntos_formateados, ',');
        $puntosTotales = substr($puntos_formateados, 0, $pos_coma);
        
        // Retorna el precio formateado con un apóstrofe como separador entre la parte entera y la decimal
        return $puntosTotales;
    }
}