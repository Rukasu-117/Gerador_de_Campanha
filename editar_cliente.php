<?php
include '../PHP/connect_DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    $sql = "UPDATE campanha SET nome='$nome', cpf='$cpf' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];

    $sql = "SELECT * FROM campanha WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $cpf = $row["cpf"];
    } else {
        echo "Cliente não encontrado.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo $cpf; ?>">
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
