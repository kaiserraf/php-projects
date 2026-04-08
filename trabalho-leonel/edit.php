<html>
<head>
<title>Editar Funcionarios | Empresa X</title>
<?php include ('config.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<a href="index.html">Home</a>

<form action="edit.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan="5" align="center">Editar Funcionario</td>
  </tr>
  <tr>
    <td width="18%" align="right">matricula:</td>
    <td width="26%"><input type="number" name="matricula" /></td>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome" /></td>
    <td width="18%" align="right">cpf:</td>
    <td width="26%"><input type="number" name="cpf" /></td>
    <td width="18%" align="right">salario:</td>
    <td width="26%"><input type="number" name="salario" /></td>
    <td width="21%"><input type="submit" name="botao" value="Alterar" /></td>
  </tr>
</table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['botao']) && $_POST['botao'] == "Alterar") {
    $matricula = intval($_POST['matricula']);
    $cpf = intval($_POST['cpf']);
    $salario = intval($_POST['salario']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);

    // Validação básica
    if ($matricula > 0) {

        // atualiza cpf se fornecido
        if ($cpf > 0) {
            mysqli_query($mysqli, "UPDATE funcionarios SET cpf='$cpf' WHERE matricula='$matricula'");
        }

        // Atualiza a salario se for fornecida
        if ($salario > 0) {
            mysqli_query($mysqli, "UPDATE funcionarios SET salario='$salario' WHERE matricula='$matricula'");
        }

        // Atualiza o nome se for fornecido
        if (!empty($nome)) {
            mysqli_query($mysqli, "UPDATE funcionarios SET nome='$nome' WHERE matricula='$matricula'");
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($mysqli);
    } else {
        echo "matricula inválida.";
    }
}
?>
</body>
</html>