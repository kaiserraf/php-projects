<html>
    <head>
        <title>Novo Funcionario | Empresa X</title>
        
        <?php include ('config.php'); ?>
    </head>
    <body>
        <p>novo funcionarios</p>
        <a href="index.html">Home</a>

        <form action="create.php" method="post" name="cliente">
            <table width="200" border="1">
                <tr>
                    <td>Criar Cliente</td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td><input type="text" name="nome"></td>
                </tr>
                <tr>
                    <td>cpf</td>
                    <td><input type="text" name="cpf"></td>
                </tr>
                <tr>
                    <td>Data de Nascimento</td>
                    <td><input type="date" name="nascimento"></td>
                </tr>
                <tr>
                    <td>Salario</td>
                    <td><input type="text" name="salario"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="gravar" name="botao"></td>
                </tr>
            </table>
        </form>

        <?php
            if(@$_POST['botao'] == "gravar")
            {
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $nascimento = $_POST['nascimento'];
                $salario = $_POST['salario'];

                $insere = "INSERT INTO funcionarios (nome, cpf, data_ncto, salario)
                VALUES ('$nome','$cpf','$nascimento','$salario')";
                mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
            }
        ?>
    </body>
</html>