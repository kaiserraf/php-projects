<html>
<head>
<title>Editar Aluno | Medianeira</title>
<?php include ('config.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<a href="index.html">Home</a>

<form action="edit.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan="5" align="center">Editar Aluno</td>
  </tr>
  <tr>
    <td width="18%" align="right">matricula:</td>
    <td width="26%"><input type="number" name="matricula" /></td>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome" /></td>
    <td width="18%" align="right">nota1:</td>
    <td width="26%"><input type="number" name="nota1" /></td>
    <td width="18%" align="right">nota2:</td>
    <td width="26%"><input type="number" name="nota2" /></td>
    <td width="18%" align="right">mensalidade:</td>
    <td width="26%"><input type="number" name="mensalidade" /></td>
    <td width="21%"><input type="submit" name="botao" value="Alterar" /></td>
  </tr>
</table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['botao']) && $_POST['botao'] == "Alterar") {
    $matricula = intval($_POST['matricula']);
    $nota1 = intval($_POST['nota1']);
    $nota2 = intval($_POST['nota2']);
    $mensalidade = intval($_POST['mensalidade']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);

    // Validação básica
    if ($matricula > 0) {

        // atualiza cpf se fornecido
        if ($nota1 != null) {
            mysqli_query($mysqli, "UPDATE ra_2025105563 SET nota1='$nota1' WHERE matricula='$matricula'");
        }
        if ($nota2 != null) {
            mysqli_query($mysqli, "UPDATE ra_2025105563 SET nota2='$nota2' WHERE matricula='$matricula'");
        }

        // Atualiza a salario se for fornecida
        if ($mensalidade != null) {
            mysqli_query($mysqli, "UPDATE ra_2025105563 SET mensalidade='$mensalidade' WHERE matricula='$matricula'");
        }

        // Atualiza o nome se for fornecido
        if (!empty($nome)) {
            mysqli_query($mysqli, "UPDATE ra_2025105563 SET nome='$nome' WHERE matricula='$matricula'");
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