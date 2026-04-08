<html>
    <head>
        <title>Deletar Funcionario | Empresa X</title>
        <?php include ('config.php');  ?>
        
    </head>
    <body>
        <p>deletar funcionarios</p>
        <a href="index.html">Home</a>

        <form action="delete.php?botao=gravar" method="post" name="form1">
            <table>
                <tr>
                    <td>Excluir Funcionario</td>
                </tr>
                <tr>
                    <td>Matricula:</td>
                    <td><input type="number" name="matricula"></td>
                    <td>Nome:</td>
                    <td><input type="text" name="nome"></td>
                    <td><input type="submit" name="botao" value="excluir"></td>
                </tr>
            </table>
        </form>

        <?php if (@$_POST['botao'] == "excluir") { ?>

        <?php
        $matricula = $_POST['matricula'];
        $nome = $_POST['nome'];

        //DELETE
        mysqli_query($mysqli, "DELETE FROM funcionarios WHERE matricula= '$matricula' OR nome='$nome'");
        mysqli_close($mysqli);
        }
        ?>

    </body>
</html>