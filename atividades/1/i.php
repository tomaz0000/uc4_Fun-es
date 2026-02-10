<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão de Hora</title>
</head>
<body>


<form action="./hr.php">
    <h1>Converter Data e Hora</h1>

    <label>Data e Hora:</label>
    <input type="local" name="datahora" required>
    <br><br>

    <label>Escolha o país:</label>
    <select name="local" required>
        <option value="America/Sao_Paulo">São Paulo</option>
        <option value="America/New_York">Nova York</option>
        <option value="Europe/London">Londres</option>
    </select>

    <br><br>
    <button type="submit">Enviar</button>
</form>

</body>
</html>







