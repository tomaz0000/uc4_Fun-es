<?php 

echo "<h1> Funções data hora</h1>";
date_default_timezone_set('America/Sao_paulo');
echo "<h4>data atual  </h4>" .date("y-m-d"). "<p>";
echo "<h4>hora atual </h4>" .date("h:i:s"). "<p>";
echo "<h4>data e hora atual </h4>" .date("Y-m-d h:i:s"). "<p>";
echo "<hr>";
//formatacao de data para 
$data = "2026-02-10";
$data_formatada = date("d/m/y", strtotime($data));
 echo "<h2>Data formatada <h2>   ".$data_formatada ;
//calculos matematicos 
$novadata = date("Y-m-d" ,strtotime($data. "+3 months"));
echo "<br> <br>Data de hoje mais tres meses ".$novadata;
//subtracao 
$data1 = "2026-02-10";
$data2 = "2000-02-10";
$diferenca = strtotime($data1) - strtotime($data2);
$dias = floor($diferenca/(60*60*24));
//floor = arredonda pra baixo tirando os numeros decimais 
echo "<p>Diferenca em dias :".$dias."<br>";
//retorna a data atual em segundos 
echo time();
echo"hr";
?>