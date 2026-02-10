<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <label>Data de nascimento:</label>
    <input type="date" name="nascimento" required><br><br>
    <button type="submit">Calcular idade</button>
</form>
   

</body>
</html> 

<?php
if($_POST){
    //pega o dia do nascimento 
    $nasc = new DateTime($_POST["nascimento"]);
    $hoje = new DateTime();
//o datetime sem nada puxa o dia atual 
//ja o que vem com puxa a data colocada 

//vai fazer a comparacao do nascimento ate o de  hoje 
    $dif = $nasc->diff($hoje);

    echo "<h3>Idade: {$dif->y} anos, {$dif->m} meses e {$dif->d} dias.</h3>";
}
?>