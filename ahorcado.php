<?php
if ($argc != 2){
    echo 'Numero incorrecto de parametros';

    $secretWord = $argv[1];

    echo 'Bienvenido a el juego Ahorcado'. PHP_EOL; //SALTO DE LINEA EN PHP
    echo 'la palabra secreta tiene'.mb_strlen($secretWord).'palbras' . PHP_EOL; // funcion calcula cantidad fe caracteres que tiene un string
    
}