<?php

Class CalculadoraPrecios{

    public static function calcularPrecioPedido($pedidos){
        $precioTotal = 0;

        foreach ($pedidos as $pedido){
            $precioTotal += $pedido->calculaPrecioCantidad();
        }

        return $precioTotal;        

    }

    public static function formatPrecios($precio){

        $precio_formateado = number_format($precio, 2, ',', '.');
        // Encontrar la posición de la coma decimal
        $pos_coma = strpos($precio_formateado, ',');

        // Obtener la parte entera (números antes de la coma)
        $parte_entera = substr($precio_formateado, 0, $pos_coma);

        $precio_formateado = number_format($precio, 2, ',', '.');
        // Encontrar la posición de la coma decimal
        $pos_coma = strpos($precio_formateado, ',');

        // Obtener la parte entera (números antes de la coma)
        $parte_decimal = substr($precio_formateado, $pos_coma + 1);

        return "$parte_entera'$parte_decimal";

    }

    public static function subtotalSinIVA($pedidos){
        $precio = self::calcularPrecioPedido($pedidos);
        // Porcentaje de IVA (por ejemplo, 21%)
        $porcentajeIVA = 21;

        // Calcular el precio sin IVA
        $precioSinIVA = $precio / (1 + ($porcentajeIVA / 100));

        return $precioSinIVA;
    }

    public static function IVA($pedidos){
        $precioConIVA = self::calcularPrecioPedido($pedidos);
        $precioSinIVA = self::subtotalSinIVA($pedidos);
        // Calcular solo el IVA
        $IVA = $precioConIVA - $precioSinIVA;
        return $IVA;
    }
}