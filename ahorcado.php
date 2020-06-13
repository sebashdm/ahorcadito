<?php

//Primer criterio de aceptacion

//---------------------------------------------------------
if ($argc != 2){
    echo 'Numero incorrecto de parametros';
    exit();
}

    $secretWord = $argv[1];

    echo 'Bienvenido a el juego Ahorcado'. PHP_EOL; //SALTO DE LINEA EN PHP
    echo 'la palabra secreta tiene'.mb_strlen($secretWord).'palbras' . PHP_EOL; // funcion calcula cantidad fe caracteres que tiene un string

//---------------------------------------------------------------
const MAX_ATTEMPS = 7;
 $attemps = 0;

 $letterGuessed = [];
do{
    echo 'por favor digite una letra' . PHP_EOL;
    $letter = trim(fgetc(STDIN)); // separa la letra
    $letters =  str_split_unicode($secretWord); // combientre la palabra en un array

    if(in_array($letter,$letters)){

        $letterGuessed[] = $letter;

        echo 'correcto: ' . get_guessed_word($secretWord, $letterGuessed).PHP_EOL;
    }else{
        echo 'incorrecto: '. get_guessed_word($secretWord, $letterGuessed) . PHP_EOL;
    }
    $attemps++;

}while($attemps < MAX_ATTEMPS && !is_word_guessed($secretWord,$letterGuessed));

if(is_word_guessed($secretWord,$letterGuessed)){
    echo "Ganaste" . PHP_EOL;

}else {
    echo "Perdiste" . PHP_EOL;
}

function is_word_guessed(string $secretWord, array $letterGuessed) : bool{ // verifica si la palabra ya esta adivinada
   return $secretWord == get_guessed_word($secretWord,$letterGuessed);

}



function str_split_unicode($str){
    return preg_split("//u",$str,-1,PREG_SPLIT_NO_EMPTY);
}

function get_guessed_word($secretWord,$letterGuessed) // devuelve la palabra adivinada
{
    $letters = str_split_unicode($secretWord);
    $guessedWord = '';

    foreach ($letters as $letter){
        if(!in_array($letter,$letterGuessed)){

            $guessedWord .= '_';
        }else{
            $guessedWord .=$letter;
        }
    }

    return $guessedWord;
}