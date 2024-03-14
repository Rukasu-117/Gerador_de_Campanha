<?php
require_once 'connect_DB.php';

// Obter o primeiro dia do mês anterior
$first_day_last_month = date('Y-m-d', strtotime('first day of last month'));
// Obter o último dia do mês anterior
$last_day_last_month = date('Y-m-d', strtotime('last day of last month'));

// Query para selecionar todos os clientes dentro do mês anterior
$sql = "SELECT * FROM campanha WHERE data_sorteio BETWEEN '$first_day_last_month' AND '$last_day_last_month'";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Retorna os resultados como JSON
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo "0 results";
}
$conn->close();
?>
