<?php
// Pega via POST ou  se vier via GET por engano
$data = $_POST['datahora'] ?? $_GET['datahora'] ?? null;
$fuso = $_POST['local']    ?? $_GET['local']    ?? null;


try {
   
    $dt = new DateTime($data, new DateTimeZone('America/Sao_Paulo'));

    // Converte para o local  escolhido
    $dt->setTimezone(new DateTimeZone($fuso));

    echo "<h1>Data convertida:</h1>";
    echo "<p>" . $dt->format("d/m/Y H:i:s") . "</p>";

} catch (Exception $e) {
    // Mostra o erro de forma simples (ex.: fuso inválido)
    echo "Erro: " . htmlspecialchars($e->getMessage());
}
