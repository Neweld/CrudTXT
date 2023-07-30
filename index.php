<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8" />
  <title>Alugel de Charretes</title>
  <style>
  input[type="submit"],
  input[type="reset"],
  button[type="submit"] {
    background-color: #4CAF50;
    border: none;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
    margin-right: 5px;
    padding: 8px;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover,
  input[type="reset"]:hover,
  button[type="submit"]:hover {
    background-color: #3e8e41;
  }

  td:first-child {
    font-weight: bold;
    text-align: right;
    vertical-align: top;
    width: 30%;
  }

  textarea {
    height: 100px;
    resize: vertical;
  }

  tr:last-child td {
    text-align: right;
  }

  tr:last-child td button {
    background-color: #008CBA;
  }

  tr:last-child td button:hover {
    background-color: #006d8a;
  }
  </style>
</head>

<body>

  <form method="get" name="dados" action="insert.php" onSubmit="return enviardados();">
    <center>
      <h1>Aluguel de Charretes</h1>
    </center>


    <table width="588" border="0" align="center">

            <!-- Nome -->
      <tr>
        <td width="118">
          <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font>
        </td>
        <td width="560">
          <input name="nome" type="text" class="formbutton" id="nome" size="52" maxlength="150" placeholder="Digite seu primeiro nome">
        </td>
      </tr>
            <!-- Idade --> 
      <tr>
        <td width="132">
          <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Idade:</font>
        </td>
        <td width="460">
          <input name="idadee" type="text" class="formbutton" id="idadee" size="52" maxlength="150" placeholder="Digite sua idade">
        </td>
      </tr>
            <!-- E-mail --> 
      <tr>
        <td>
          <font size="2" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font>
        </td>
        <td>
          <font size="2">
            <input name="email" type="text" id="email" size="52" maxlength="150" class="formbutton" placeholder="Digite seu e-mail para contato">
          </font>
        </td>
      </tr>
            <!-- Data aquisição-->
      <tr>
        <td>
          <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Data de aquisição:</font>
        </td>
        <td>
          <font size="2">
            <input name="dateaq" type="date" id="dateaq" class="formbutton">
          </font>
        </td>
      </tr>
            <!-- Data devolução-->
            <tr>
        <td>
          <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Data de devolução:</font>
        </td>
        <td>
          <font size="2">
            <input name="datead" type="date" id="datead" class="formbutton">
          </font>
        </td>
      </tr>
            <!-- Tipo de carroça -->
            <tr>
        <td>
          <font face="Verdana, Arial, Helvetica, sans-serif">
            <font size="2">Tipo da Charrete<strong>:</strong></font>
          </font>
        </td>
            <td>
        <select name="viagem" id="viagem">
                <option value="">Escolha qual tipo de charrete deseja alugar!</option>
                <option value="Milord">Milord</option>
                <option value="Sociable">Sociable</option>
                <option value="Jardineira">Jardineira</option>
                <option value="Arana">Arana</option>
                </select>
        </td>
      </tr>
            <!-- Mensagem -->
      <tr>
        <td>
          <font face="Verdana, Arial, Helvetica, sans-serif">
            <font size="2">Finalidade do transporte<strong>:</strong></font>
          </font>
        </td>
        <td rowspan="2">
          <font size="2">
            <textarea name="mensagem" cols="50" rows="6" class="formbutton" id="mensagem" input placeholder="Descreva em poucas palavras"></textarea>
          </font>
        </td>
      </tr>
      <tr>

        <td height="85">
          <p><strong>
              <font face="Verdana, Arial, Helvetica, sans-serif">
                <font size="1">
                </font>
              </font>
            </strong></p>
        </td>
      </tr>

      <tr>
        <td height="22"></td>
        <td>
          <input name="Submit" type="submit" class="formobjects" value="Cadastrar">
          <input name="Reset" type="reset" class="formobjects" value="Limpar campos">
          <button type='submit' formaction='list.php'>Consultar</button>


        </td>
      </tr>
    </table>
  </form>

</body>

</html>