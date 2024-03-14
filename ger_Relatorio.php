<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riopae Para Dar Sorte</title>
    <link rel="icon" href="../logo_aba.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <?php include 'PHP/extrair_Dados_Campanha.php'; ?>
    <link rel="stylesheet" href="../Styles/numsorte.css">
    <link rel="stylesheet" href="../Styles/stymenu.css">

</head>

<body>

    <?php include './menu_Lateral.php'; ?>

    <div class="wrapper">
        <div class="container">
            <img src="../logo.jpg" alt="Logo Riopae">
            <h1>Relatório Geral de Clientes</h1>
            <button onclick="extractToExcel()">Gerar Relatorio</button>
        </div>
    </div>

<script>
    function extractToExcel() {
            var databaseData = <?php echo json_encode($databaseData); ?>;
            
            // Cria um workbook
            var wb = XLSX.utils.book_new();
            // Cria uma planilha
            var ws = XLSX.utils.aoa_to_sheet(databaseData);
            // Adiciona a planilha ao workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Dados do Banco');

            // Converte o workbook para um blob com o tipo MIME adequado
            var wbBlob = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
            wbBlob = new Blob([wbBlob], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });

            // Cria um URL temporário para o blob
            var url = URL.createObjectURL(wbBlob);

            // Cria um link para o URL e simula um clique para baixar o arquivo
            var link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'dados_banco.xlsx');
            document.body.appendChild(link);
            link.click();

            // Limpa o URL temporário
            URL.revokeObjectURL(url);
            document.body.removeChild(link);
        }



</script>

</body>
</html>