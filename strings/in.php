<?php
//strlen - Retorna o tamanho de uma string 
$strlen = "senac Santos";
$tamanho = $strlen($strlen);
/**/ 
echo $tamanho;


// strpos verfica quantos caracteres existem antes da palavra 

$resultado =strpos($strlen,"Santos");
echo  "<br>" .$resultado;


//str_replace  = substitui uma palavra 
$strlen = "saeja bem vindo ao Google";
$resultado = str_replace("Gooogle","Senac" , $strlen);
echo "<br>" .$resultado;

//substr = retorna parte do texto 
$resultado = substr($strlen,5 ,7);
echo "<br>" .$resultado;


//STRLOWER = TRANFORMA EM MINUSCULO
$strlen = "Aula de Php";
echo "<br>" .$strlen;
$resultado = strtolower($strlen);
echo "<br>" .$resultado;

//transforma em maisculo
$strlen = "Aula de Php";
echo "<br>" .$strlen;
$resultado = strtoupper($strlen);
echo "<br>" .$resultado;

//ucwords = cada palavra a primeira sempre é maiscula 
$strlen = ucwords($strlen);
echo "<br>" .$resultado;


//repete a string em um numero especifico de vezes 
$strlen = "Curso de informatica ";
$resultado = str_repeat($strlen,10);
echo "<br>" .$resultado;


//strrev - inverte a string 
$strlen = "Senac";
$resultado = strrev($strlen);
echo "<br>" .$resultado;



//strcmp - comparacao de string (sensivel letra maiuscula e minuscula)
  $palavra1 = "Senac";
  $palavra2 = "Senac";
  $resultado = strcmp($palavra1,$palavra2);
  echo "<br>".$resultado."<br>";
 
 
 
?>