<html>
    <head>
        <title>Funcionarios | Empresa X</title>
        
        <?php include ('config.php');  ?>
    </head>
    <body>
        <p>listar funcionarios</p>
        <a href="index.html">Home</a>

        <form action="list.php?botao=gravar" method="post" name="form1">
            <table>
                <tr>
                    <td colspan=5 align="center">Relatório de Alunos</td>
                </tr>
                <tr>
                    <td width="18%" align="right">Nome:</td>
                    <td width="26%"><input type="text" name="nome"  /></td>
                    <td width="17%" align="right">CPF:</td>
                    <td width="18%"><input type="text" name="cpf" size="15" /></td>
                    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
                </tr>
            </table>
        </form>

        <?php if (@$_POST['botao'] == "Gerar") {?>

        <table>
            <tr>
                <th>Matricula</th>
                <th>Nome</th>
                <th>Cpf</th>
                <th>Data de Nascimento</th>
                <th>Salario</th>
                <th>Bonus</th>
                <th>Total</th>
            </tr>

            <?php
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];

                $query = "SELECT *
                        FROM funcionarios
                        WHERE matricula > 0 ";
                $query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
                $query .= ($cpf ? " AND cpf LIKE '%$cpf%' " : "");
                $query .= " ORDER by matricula";

                $result = mysqli_query($mysqli, $query);

                while($coluna=mysqli_fetch_array($result)){

                $salario = $coluna['salario'];
                $bonus   = $salario * 0.1;       // calcula o bônus
                $mesAtual = date('m');
                $mesNasce = date('m', strtotime($coluna['data_ncto']));
                
                if($mesAtual == $mesNasce){
                    $total = $salario + $bonus;
                }else{
                    $total = $salario;
                }
            ?>

                <tr>
                    <th><?php echo $coluna['matricula']; ?></th>
                    <th><?php echo $coluna['nome']; ?></th>
                    <th><?php echo $coluna['cpf']; ?></th>
                    <th><?php echo $coluna['data_ncto']; ?></th>
                    <th><?php echo $coluna['salario']; ?></th>
                    <th><?php echo $bonus; ?></th>
                    <th><?php echo $total; ?></th>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php
        }
        ?>
    </body>
</html>