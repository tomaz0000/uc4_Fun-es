<?php

$nome = $_POST['nome'] ?? $_GET['nome'] ?? null;
$email = $_POST['email'] ?? $_GET['email'] ?? null;
$frase = $_POST['frase'] ?? $_GET['frase'] ?? null;





$resultado = strtolower($nome); /* Converter o nome para letras minúsculas*/
echo "<h3>1. Nome formatado</h3>";
echo $resultado;
echo "<hr>";

$resultado = ucfirst($nome); /*Depois deixar apenas a primeira letra maiúscula  */
echo "<h3>1. Nome formatado para a primeira letra maiscula </h3>";
echo $resultado;
echo "<hr>";


/*2.    Quantidade de caracteres 
Mostrar quantos caracteres possui o nome completo. */
$resultado =strlen($nome);
echo "<h3>2. Quantidade de caracteres</h3>";
echo $resultado;
echo "<hr>";



/*3.    Primeiro nome 
Exibir apenas o primeiro nome do usuário. 
  */
$partes = explode(" ", $nome);
$primeiro_nome = $partes[0];

echo "<h3>3. Primeiro nome</h3>";
echo $primeiro_nome;
echo "<hr>";

/*4.    Email verificado 
O sistema deve verificar se o email contém "@". 
Se NÃO tiver → mostrar:  Email inválido 
Se tiver →  Email válido */
 
if ( strpos($email, "@")  === false) {

$mensagem = "Email inválido";
echo "<h3>4. Verificação de Email</h3>";
echo $mensagem;
echo "<hr>";
;}
 else {
    $mensagem = "Email válido";
echo "<h3>4. Verificação de Email</h3>";
echo $mensagem;
echo "<hr>";
    }




    echo "<h3>5. Frase digitada</h3>";
echo $frase;

/*5.    Censura automática 
Na frase digitada: 
substituir a palavra "programação" por "tecnologia"  */

$resultado = str_replace("Programação" | "programação" & "programacao","Tecnologia" , $frase);
 echo "<h3>5. Palavra Trocada </h3>";
echo $resultado;



/*6.    Frase invertida 
Mostrar a frase ao contrário.  */
$strlen = $frase;
$resultado = strrev($strlen);
echo "<br> <h3>Palavra ao contrario </h3> " .$resultado;



/*7.     Comparação de palavras 
Comparar se o primeiro nome é igual a "admin": 
ignorando maiúsculas/minúsculas 
Se for igual: 
Usuário administrador detectado!  */
 if (strcasecmp($primeiro_nome, "admin") == 0) {
echo "<h3>Usuario administrador detectado !! </h3>";
 }

 else {
    echo "<h3>Usuário Comum</h3> ";
 }

echo "<h3> Desafios Extras</h3>";

echo "<h3> Mostrar o nome em MAIÚSCULO</h3>";
echo strtoupper($nome);

echo "<h4>10 primeiros caracteres da frase</h4>";
echo substr($frase, 0, 10);


echo "<br><br>";
echo "<h4>Repetir a frase 3 vezes</h4>";
echo str_repeat($frase, 3);

echo "<br><br>";
echo "<h4>Contar quantas vezes aparece a letra 'A' </h4>";
echo substr_count(strtolower($frase), "a");

?>