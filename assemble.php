<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
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
  if (isset($_POST['codigo'])) 
  {
    if (file_exists("arq.txt") && !empty(file_get_contents("arq.txt"))) 
    {
      $lista = explode("\n", file_get_contents("arq.txt"));
      $conjunto = 1;
      $contador = 0;
      while ($contador < count($lista)) 
      {
        if ("#" == $lista[$contador]) 
        {
          if ($conjunto == $_POST['codigo']) 
          {
            $nome = explode(": ", $lista[$contador + 1]);
            $nome = $nome[1];
            $idadee = explode(": ", $lista[$contador + 2]);
            $idadee = $idadee[1];
            $email = explode(": ", $lista[$contador + 3]);
            $email = $email[1];
            $dateaq = explode(": ", $lista[$contador + 4]);
            $dateaq = $dateaq[1];
            $datead = explode(": ", $lista[$contador + 5]);
            $datead = $datead[1];
            $viagem = explode(": ", $lista[$contador + 6]);
            $viagem = $viagem[1];
            $mensagem = explode(": ", $lista[$contador + 7]);
            $mensagem = $mensagem[1];
            $contador += 8;

            #verifica a quantidade de linhas no input mensagem 
            while ("#" != $lista[$contador] and $contador < count($lista) - 1)
            {
              $mensagem .= $lista[$contador];
              $contador += 1;
            }
            break;
          }
          $conjunto += 1;
        }
        $contador += 1;
      }
    }
  }
  ?>

  <form method="post" action="update.php">

    <h1>Formulário - Atualizar registro</h1><br>

    <label for="codigo">Código:</label>
    <input type="number" id="codigo" name="codigo" style="background-color: grey;" placeholder="<?php echo isset($_POST['codigo']) ? $_POST['codigo'] : ''; ?>" value="<?php echo isset($_POST['codigo']) ? $_POST['codigo'] : ''; ?>" readonly><br>

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" placeholder="<?php echo isset($nome) ? $nome : ''; ?>" value="<?php echo isset($nome) ? $nome : ''; ?>" autofocus required><br>

    <label for="idadee">Idade:</label>
    <input type="text" id="idadee" name="idadee" placeholder="<?php echo isset($idadee) ? $idadee : ''; ?>" value="<?php echo isset($idadee) ? $idadee : ''; ?>" required><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="<?php echo isset($email) ? $email : ''; ?>" value="<?php echo isset($email) ? $email : ''; ?>" required><br>

    <label for="dateaq">Data de aquisição:</label>
    <input type="text" id="dateaq" name="dateaq" placeholder="<?php echo $dateaq; ?>" value="<?php echo $dateaq; ?>" required><br>

    <label for="datead">Data de devolução:</label>
    <input type="text" id="datead" name="datead" placeholder="<?php echo $datead; ?>" value="<?php echo $datead; ?>" required><br>

    <label for="viagem">Tipo de charrete:</label>
    <input type="text" id="viagem" name="viagem" placeholder="<?php echo $viagem; ?>" value="<?php echo $viagem; ?>" required><br>

    <label for="mensagem">Mensagem:</label>
    <textarea type="text" id="mensagem" name="mensagem" rows="10" cols="40"><?php echo $mensagem; ?></textarea><br>

    <input type="submit" value="Enviar">

  </form>

  <br><br>
  <button onclick="window.location.href = 'index.php'">Cadastrar Registro</button>
<button onclick="window.location.href = 'delete.php'">Deletar Registro</button>
<button onclick="window.location.href = 'select.php'">Atualizar Registro</button>
<button onclick="window.location.href = 'pick.php'">Listar Registro</button>
</body>
</html>