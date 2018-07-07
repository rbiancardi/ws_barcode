<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ws_ResponseCode extends Model
{
    public function responseList($cat, $extended)
    {
        $responseCategory = array('0' => 'Transaccion OK  - Autorizada',
            '1' => 'Conexion Rechazada - Error en la estructura del Requerimiento',
            '2' => 'Conexion Rechazada - Error en los datos del Cliente ',
            '3' => 'Conexion Rechazada - Integridad del Requerimiento No Asegurada',
            '4' => 'Conexion Rechazada - Error en los datos del Producto',
            '5' => 'Conexion Rechazada - Error en la Plataforma de Primer Bit');

        $respondeExtended = array(

            // Transaccion OK
            '000' => 'OK - La transaccion se proceso correctamente',

            
            // Errores en el Requerimiento
           
            '100' => 'El Requerimiento no Contiene Informacion',
            '101' => 'El Campo Merchant_ID es obligatorio para este requerimiento',
            '102' => 'El Campo api_user es obligatorio para este requerimiento',
            '103' => 'El Campo barcode es obligatorio para este requerimiento',
            '104' => 'El Campo reader_name es obligatorio para este requerimiento',
            '105' => 'El Campo branch es obligatorio para este requerimiento',
            '106' => 'El Campo trx_type es obligatorio para este requerimiento',
            '107' => 'El Campo secret_key es obligatorio para este requerimiento',
            '108' => 'El Campo timestamp es obligatorio para este requerimiento',
            '109' => 'El Campo reader_ip es obligatorio para este requerimiento',
            '110' => 'El Campo access_token es obligatorio para este requerimiento',
            

            //Errores en los datos del Cliente
            '201' => 'No es posible encontrar el Comercio o el mismo no existe en la plataforma',
            '202' => 'Merchant_ID/Comercio deshabilitado',
            '203' => 'Tipo de Transaccion no permitida para el Merchant_ID/Comercio',
            '204' => 'Tipo de Transaccion no permitida para ser ejecutada desde un Lector',
            '205' => 'No corresponde la sucursal para el comercio',
            '206' => 'No Existe la sucursal',
            '207' => 'Sucursal Deshabilitada',
            '208' => 'No Existe el lector',
            '209' => 'Lector Deshabilitado',
            '210' => 'No corresponde el Lector con la sucursal',
            '211' => 'No corresponde el Lector con el comercio',
            '212' => 'Comercio en mantenimiento',

            //Errores de Seguridad / Integridad
            '300' => 'SecretKey Incorrecto',
            '301' => 'AccessToken Incorrecto',

            //Errores de Producto
            '400' => 'No se encontro el Producto',
            '401' => 'Producto Deshabilitado',
            '402' => 'Producto no pertenece a la sucursal',
            '403' => 'Producto no pertenece al comercio',

            //Veridicar Mensajes
            '500' => 'Error de base de datos',
            '501' => 'Error recuperando datos',
            '502' => 'No se encuentran los datos del comercio',
            '503' => 'Error actualizando datos',
            '504' => 'Error insertando datos',
            '505' => 'Error no especificado',
            '506' => 'Comercio en mantenimiento',
            '507' => 'Comercio deshabilitado',
            '508' => 'Falta un campo mandatario',
            '509' => 'Tipo o longitud invá¡lido(a)',
            '510' => 'Producto no configurado',
            '511' => 'Error de conexión con el procesador',
            '512' => 'Método de procesamiento no habilitado para el comercio',
            '513' => 'Servicio en mantenimiento');

        $responseCode = array(
            'Main Response: ' => 'Transaction Result Code: ' . $cat . ' => ' . $responseCategory[$cat],
            'Response Extended:' => array('Response Code: ' => $extended . ' - ' . $respondeExtended[$extended]));

        return $responseCode;
    }
} //Fin de la Clase
