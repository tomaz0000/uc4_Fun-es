<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form method="post">
    <label>Data de admissão:</label>
    <input type="date" name="entrada" required><br><br>

    <label>Data de demissão:</label>
    <input type="date" name="saida" required><br><br>

    <button type="submit">Calcular tempo</button>
</form>



</body>
</html>


<?php
if($_POST){
    //vai pegar as variaveis e vai fazer um calculo de quando foi admitido e quando foi demitido 
    $entrada = new DateTime($_POST["entrada"]);
    $saida   = new DateTime($_POST["saida"]);

    //calculo do intervalo entre as duas datas 
    //dif = pega as datas e compara os dias ou ate anos e meses com a data final,
    //fazendo uma contagem  
    $dif = $entrada->diff($saida);

    
    echo "<h3>Tempo trabalhado: {$dif->y} anos, {$dif->m} meses e {$dif->d} dias.</h3>";
}
?>