<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<title>Aluguel de Charretes</title>
<style>
button 
{
background-color: purple;
border-radius: 5px;
box-shadow: 1 1 10px rgba(0,0,0,0.1);
border: none;
color: yellow;
cursor: pointer;
font-size: 14px;
margin-right: 5px;
padding: 8px;
transition: background-color 0.3s ease;
}

button:hover
{
background-color: blueviolet;
}
* {
    text-align: center;
    margin-top: 20px;
    color: purple rgba(0,0,0,0.1);
    border-radius: 2px;
}

</style>
<body>
    <?php
    if (file_exists("arq.txt") && !empty(file_get_contents("arq.txt")))
    {
        $lista = explode("\n", file_get_contents("arq.txt")); 
        $conjunto = 1; 
        $contador = 0; 
        foreach ($lista as $lista_item)
        //$coisa = explode($indice, $lista[$tmp2]);
        {
            if ("#" == $lista[$contador])
            {
                echo $conjunto; 
                $conjunto += 1;
            }
            echo $lista_item . "<br>";
            $contador += 1; 
        }
        echo "----------------- Fim de Arquivo -----------------";
    }
    else 
    {
        echo "<br><br><br> < palign=center> Ainda não há nenhum registro!</p>";
    }
    ?>

<br><br>
    <button onclick="window.location.href = 'index.php'"> Cadastrar Registro</button>
    <button onclick="window.location.href = 'delete.php'"> Deletar Registro</button>
    <button onclick="window.location.href = 'select.php'"> Atualizar Registro</button>
</body>
</html>