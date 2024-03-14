<?php
// Receber os dados enviados pelo JavaScript
$data = json_decode(file_get_contents("php://input"), true);

// Criar um arquivo Excel
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Adicionar os dados ao arquivo Excel
foreach ($data as $rowIndex => $row) {
    foreach ($row as $columnIndex => $value) {
        $sheet->setCellValueByColumnAndRow($columnIndex + 1, $rowIndex + 1, $value);
    }
}

// Configurar o cabeçalho para indicar que estamos enviando um arquivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="dados_banco.xlsx"');
header('Cache-Control: max-age=0');

// Escrever o arquivo Excel para a saída
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
