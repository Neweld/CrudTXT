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
    <form method="get" target="_self">
    <center><h1>Apague o registro do aluguel</h1></center>
    <label for="codigo">Escolha o código de um conjunto de dados a ser deletado: </label>
    <input type="number" id="codigo" name="codigo" required></br>
    <input type="submit" value="Enviar"></br>
    </form>
    <?php
    if (file_exists("arq.txt") &&!empty(file_get_contents("arq.txt"))) 
    {
        # code...
        $lista = explode("\n", file_get_contents("arq.txt"));
        $conjunto =1; //Variavel para continuar a ordem de aparção do indice, neste exemplo foi usado o #
        echo "</br>";
        # função read ou mais conhecido como select do conjunto de comandos SQL
        foreach ($lista as $lista_item) 
        {
            //vai percorrer todas as linhas do arquivo 
            //$coisa = explode($indice, $lista[$tmp2]);
            if ("#" == $lista_item) 
            {
                //se achar um # no começo da linha, printa o valor atual da variavel de $conjunto e acrescenta mais um
                # code...
                echo $conjunto; 
                $conjunto += 1; 
            }
            echo $lista_item . "</br>"; //para cada line break no arquivo, uma tag </br>
        }
        echo "------------- Fim do Arquivo -------------";

        if (isset($_GET['codigo'])) 
        {
            # code...
            $conjunto = 1; //varuiavel para guardar a ordem de aparição do indice, neste exemplo foi usado o #
            $contador = 0; //variavel temporaria para manipulação do while e do array $lista
            $lista_itens = count ($lista); // gravando quantos itens a lista tinha antes dos unsets

            while ($contador < count($lista)) //vai percorrer todo o array que foi criado com todas as linhas do arquivo
            {
                # code...
                if ("#" == $lista[$contador]) //se achar um # no começo da linha, valida se o conjunto é qual o usuario escolheu e acrescenta mais um à variavel
                {
                    # code...
                    if ($conjunto == $_GET['codigo']) 
                    {
                        # code...
                        unset($lista[$contador]);
                        while ("#" != $lista[$contador] and $contador != $lista_itens)
                        {
                            # code...
                            unset($lista[$contador]);
                            $contador += 1;
                        } //unsets para remover os elementos da lista que foi formada com as linhas do arquivo
                        break; // esta linha é equivalente à um break;

                    }
                    $conjunto += 1;
                }
                $contador += 1; 
            }
            $contador = 0; //variavel temporaria para manipulação de array e da lista $lista
            $texto = ""; //futuro novo texto que estará no arquivo 
            while ($contador < $lista_itens) //-1 para não colocar line breaks a mais no texto para cada execução
            {
                # code...
                if (isset($lista[$contador]))//se não fez parte dos unsets do bloco de codigo anterior, será atribuido à variavel $texto
                {
                    # code...
                    $texto .= $lista[$contador] . "\n"; //o elemento válido será juntado à um linebreak na variavel
                }
                $contador += 1; 
            }
            unlink('arq.txt'); //apaga o arquivo do diretorio 
            $criar = fopen('arq.txt' , "a+"); //cria um novo com o mesmo nome já com a permissão de escrita ("a+")
            fwrite($criar, $texto); //escreve no arquivo criado exatamente o que foi colocado na variavel $texto 
            fclose($criar); //fecha o arquivo para o apache 
            header('location: /CrudWendell/delete.php'); // volta para a pagina de delete sem a atribuição do $_GET na URL;
        }
    } else 
    {
        echo "<br><br><p align=center> Ainda não há nenhum registro!</p>"; //quando não tiver mais conjuntos ou o arquivo não existir, esta mensagem será exibida
    }
    //fazendo o teste com códigos errados , simplesmente nada acontece. (o que é positivo!)
    ?>
    <br>
    <br>
    <button onclick="window.location.href = 'index.php'">Cadastrar registro</button>
    <button onclick="window.location.href = 'select.php'">Atualizar registro</button>
    <button onclick="window.location.href = 'pick.php'">Listar registro</button>
</body>
</html>