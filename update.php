         <?php
         if (isset($_POST['codigo']))
         {
            if (file_exists("arq.txt") && !empty(file_get_contents("arq.txt")))
            {
                $lista = explode("\n", file_get_contents("arq.txt")); 
                $conjunto = 1; 
                $contador = 0; 
                $lista_itens = count($lista);
                while ($contador < count($lista))
                {
                    if ("#" == $lista[$contador])
                    {
                        if ($conjunto == $_POST['codigo'])
                        {
                            $lista[$contador + 1] = "Nome: " . $_POST['nome'];
                            $lista[$contador + 2] = "Idade: " . $_POST['idadee'];
                            $lista[$contador + 3] = "Email: " . $_POST['email'];
                            $lista[$contador + 4] = "Data de aquisição: " . $_POST['dateaq'];
                            $lista[$contador + 5] = "Data de devolução: " . $_POST['datead'];
                            $lista[$contador + 6] = "Tipo da charrete: " . $_POST['viagem'];
                            $lista[$contador + 7] = "Mensagem: " . $_POST['mensagem'];
                            $contador +=8;
                            while ("#" != $lista[$contador] and $contador <= $lista_itens)
                            {
                                unset($lista[$contador]);
                                $contador += 1;
                            }
                            break;
                        }
                        $conjunto += 1; 
                    }
                    $contador += 1;
                }
                $contador = 0;
                $texto = "";
                while ($contador < $lista_itens - 1)
                {
                    if (isset($lista[$contador])) 
                    {
                        $texto .= $lista[$contador] . "\n";
                    }
                    $contador += 1;
                } 
                unlink('arq.txt');
                $criar = fopen('arq.txt', "a +");
                fwrite($criar, $texto);
                fclose($criar);
                header('Location: /CrudWendell/pick.php');
            }
         }
         ?>