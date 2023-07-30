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
<?php
date_default_timezone_set('America/Sao_Paulo');

$nome = $_GET['nome'];
$idadee = $_GET['idadee'];
$email = $_GET['email'];
$dateaq = $_GET['dateaq'];
$datead = $_GET['datead'];
$viagem = $_GET['viagem'];
$mensagem = $_GET['mensagem'];
$dataBra = date("d/m/Y", strtotime($dateaq));
$dataBrd = date("d/m/Y", strtotime($datead));

$erro = '';

if (empty($_GET))
{
    $erro = "<script language='javascript' type='text/javascript'>
    alert('Nada foi gerado!'); window.location. href='index.php'</script>";
}

foreach ($_GET as $chave => $valor)
{
    $$chave = trim(strip_tags($valor));

    if (empty($valor))
    {
        $erro = "<script language='javascript' type='text/javascript'>
        alert('Existem campos em branco!'); window.location. href='index.php'</script>";
    }
}

if ((!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) && !$erro)
{
    $erro =  "<script language='javascript' type='text/javascript'>
    alert('E-mail inválido!'); window.location. href='index.php'</script>";
}

if ($erro)
{
    echo $erro;
}
else {
    echo "<h1> Veja os dados enviados</h1>";

    foreach ($_GET as $chave => $valor)
    {
        echo '<b>' . $chave . '</b>' . htmlspecialchars($valor) . '<br><br>';
    }

    $arquivo = 'arq.txt';
    $conteudo = "#\nNome: " .$nome . "\nIdade: " .$idadee . "\nEmail: " . $email . "\nData de aquisição:  " . $dataBra . "\nData de devolução: " .$dataBrd . "\nTipo da charrete: " .$viagem . "\nMensagem:  ". $mensagem . "\n";
    $criar = fopen($arquivo, "a+");
    $escrever = fwrite($criar, $conteudo);
    fclose($criar);

    if ($escrever == true)
    {
        echo "Dados armazenados em $arquivo";
    }
    else {
        echo "Erro ao salvar dados em $arquivo";
    }
}

?>
<br><br><br><br>

<button onclick="window.location.href = 'index.php'">Cadastrar registro</button>
<button onclick="window.location.href = 'pick.php'">Listar registro</button>