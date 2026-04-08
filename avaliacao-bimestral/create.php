<html>
    <head>
        <title>Novo Aluno | Medianeira</title>
        
        <?php include ('config.php'); ?>
    </head>
    <body>
        <p>novo aluno</p>
        <a href="index.html">Home</a>

        <form action="create.php" method="post" name="cliente">
            <table width="200" border="1">
                <tr>
                    <td>Criar Aluno</td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td><input type="text" name="nome"></td>
                </tr>
                <tr>
                    <td>nota 1</td>
                    <td><input type="text" name="nota1"></td>
                </tr>
                <tr>
                    <td>nota 2</td>
                    <td><input type="text" name="nota2"></td>
                </tr>
                <tr>
                    <td>mensalidade</td>
                    <td><input type="text" name="mensalidade"></td>
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
                $nota1 = $_POST['nota1'];
                $nota2 = $_POST['nota2'];
                $mensalidade = $_POST['mensalidade'];

                $insere = "INSERT INTO ra_2025105563 (nome, nota1, nota2, mensalidade)
                VALUES ('$nome','$nota1','$nota2','$mensalidade')";
                mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
            }
        ?>
    </body>
</html>