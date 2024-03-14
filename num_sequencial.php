<?php
    require_once 'connect_DB.php';

// Consulta SQL para recuperar o valor atual da coluna numero_arquivo
$sql_numero_arquivo = "SELECT numero_arquivo FROM arquivo";
$result_numero_arquivo = $conn->query($sql_numero_arquivo);

if ($result_numero_arquivo->num_rows > 0) {
    // Recupera o valor atual da coluna
    $row = $result_numero_arquivo->fetch_assoc();
    $numero_arquivo_atual = $row["numero_arquivo"];
    
    // Soma 1 ao valor atual
    $novo_numero_arquivo = $numero_arquivo_atual + 1;

    // Consulta SQL para inserir o novo valor na tabela arquivo
    $sql_atualizar_numero_arquivo = "INSERT INTO arquivo (numero_arquivo) VALUES ($novo_numero_arquivo)";
    
} else {
    echo "Não foi possível recuperar o valor atual da coluna numero_arquivo.";
}

// Fechar conexão com o banco de dados
$conn->close();
?>