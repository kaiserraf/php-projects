<html>
    <head>
        <title>Alunos | Medianeira</title>
        
        <?php include ('config.php');  ?>
    </head>
    <body>
        <p>listar alunos</p>
        <a href="index.html">Home</a>

        <form action="list.php?botao=gravar" method="post" name="form1">
            <table>
                <tr>
                    <td colspan=5 align="center">Relatório de Alunos</td>
                </tr>
                <tr>
                    <td width="18%" align="right">Nome:</td>
                    <td width="26%"><input type="text" name="nome"  /></td>
                    <td width="17%" align="right">matricula:</td>
                    <td width="18%"><input type="text" name="matricula" size="15" /></td>
                    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
                </tr>
            </table>
        </form>

        <?php if (@$_POST['botao'] == "Gerar") {?>

        <table>
            <tr>
                <th>Nome</th>
                <th>Media</th>
                <th>Mensalidade R$</th>
                <th>Desconto</th>
                <th>Liquido</th>
            </tr>

            <?php
                $nome = $_POST['nome'];
                $matricula = $_POST['matricula'];

                $query = "SELECT *
                        FROM ra_2025105563
                        WHERE matricula > 0 ";
                $query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
                $query .= ($matricula ? " AND matricula LIKE '%$matricula%' " : "");
                $query .= " ORDER by matricula";

                $result = mysqli_query($mysqli, $query);

                while($coluna=mysqli_fetch_array($result)){

                $mensalidade = $coluna['mensalidade'];
                $nota1 = $coluna['nota1'];
                $nota2 = $coluna['nota2'];
                $media = ($nota1 + $nota2) / 2;


                if($media == 10.0){
                    // 20%
                    $desconto = $mensalidade * 0.2;
                }
                if($media >= 7.0 && $media <= 9.9){
                    // 10%
                    $desconto = $mensalidade * 0.1;
                }
                if($media < 7.0){
                    // 5%
                    $desconto = $mensalidade * 0.05;
                }

                $liquido = $mensalidade - $desconto;
            ?>

                <tr>
                    <th><?php echo $coluna['nome']; ?></th>
                    <th><?php echo $media; ?></th>
                    <th><?php echo $coluna['mensalidade']; ?></th>
                    <th><?php echo $desconto; ?></th>
                    <th><?php echo $liquido; ?></th>
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