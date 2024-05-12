<?php


/*
Funciones Globales
-----------------
Para que funcionen las funciones globales de Laravel
tenemos que agregar al autoload en composer.json
"autoload": {
    "psr-4": {
        ...  
    },
    "files": [
        "app/Funciones/globales.php"
    ]
}

Como le hicimos cambios a composer, tenemos que correr:
composer dump-autoload
*/

use Illuminate\Support\Carbon;

// Convertir Currency a Numero Float
if(!function_exists('getAmount')){
    function getAmount($money)
    {
        $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
        $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

        $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

        $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
        $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);

        return (float) str_replace(',', '.', $removedThousandSeparator);
    }
}


// Para convertir numero en moneda
if(!function_exists('formatMoneda')){
    function formatMoneda($moneda)
    {
        return "$ ".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $moneda)),2);
    }
}

// Para regresar uan fecha en formato: "13 de Marzo, 2024".
if(!function_exists('formatFecha1')){
    function formatFecha1($fecha)
    {
        $dia = Carbon::parse($fecha)->locale('es')->isoFormat('D');
        $mes = ucfirst(Carbon::parse($fecha)->locale('es')->isoFormat('MMMM'));
        $año = Carbon::parse($fecha)->locale('es')->isoFormat('YYYY');
        // $fecha = Carbon::parse($fecha)->locale('es')->isoFormat('D [de] MMMM[,] YYYY');
        $fecha = $dia.' de '.$mes.', '.$año;
        return $fecha;
    }
}

// Para regresar uan fecha en formato: "13 de Marzo, 2024 3:45 p.m.".
if(!function_exists('formatFecha2')){
    function formatFecha2($fecha)
    {
        $dia = Carbon::parse($fecha)->locale('es')->isoFormat('D');
        $mes = ucfirst(Carbon::parse($fecha)->locale('es')->isoFormat('MMMM'));
        $año = Carbon::parse($fecha)->locale('es')->isoFormat('YYYY');
        // $fecha = Carbon::parse($fecha)->locale('es')->isoFormat('D [de] MMMM[,] YYYY');

        // https://www.w3schools.com/php/func_date_date.asp
        $hora = date('g:i A', strtotime($fecha));

        $fecha = $dia.' de '.$mes.', '.$año.' '.$hora;
        return $fecha;
    }
}

// Para regresar phone number formatted Ej. Entra: 6641880604 y Regresa: (664) 188-0604
if(!function_exists('formatPhoneNumber')){

    // This function will format international (10+ digit), non-international (10 digit)
    // or old school (7 digit) phone numbers.
    // Any numbers other than 10+, 10 or 7 digits will remain unformatted.
     
    function formatPhoneNumber($phoneNumber) {
        $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

        if(strlen($phoneNumber) > 10) {
            $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
            $areaCode = substr($phoneNumber, -10, 3);
            $nextThree = substr($phoneNumber, -7, 3);
            $lastFour = substr($phoneNumber, -4, 4);

            $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
        }
        else if(strlen($phoneNumber) == 10) {
            $areaCode = substr($phoneNumber, 0, 3);
            $nextThree = substr($phoneNumber, 3, 3);
            $lastFour = substr($phoneNumber, 6, 4);

            $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
        }
        else if(strlen($phoneNumber) == 7) {
            $nextThree = substr($phoneNumber, 0, 3);
            $lastFour = substr($phoneNumber, 3, 4);

            $phoneNumber = $nextThree.'-'.$lastFour;
        }
        return $phoneNumber;
    }

}





