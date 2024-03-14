<?php
// Conexão com o banco de dados (substitua os valores conforme necessário)
require_once 'connect_DB.php';

// Consulta SQL para obter os dados do banco de dados
$sql = "SELECT     
numero_sorte,
proposta,
valor_sorteio,
data_sorteio,
nome,
cpf,
dt_Cadastro,
consultor,
idade,
prof,
estado_Civil,
pessoas_Moram,
parentesco,
idade_Parente,
ajuda_Despesa,
faixa_Salarial,
imp_Seguro,
tem_Seguro,
inv_Seguro,
logradouro,
cep,
complemento,
bairro,
cidade,
celular,
email,
dt_Nascimento
FROM campanha";
$result = $conn->query($sql);

// Array para armazenar os dados do banco de dados
$databaseData = array();

// Verifica se há resultados e os armazena no array
if ($result->num_rows > 0) {
    // Adiciona os cabeçalhos
    $databaseData[] = array(
    'Numero da Sorte',
    'proposta',
    'valor_sorteio',
    'data_sorteio',
    'nome',
    'cpf',
    'dt_Cadastro',
    'consultor',
    'idade',
    'prof',
    'estado_Civil',
    'pessoas_Moram',
    'parentesco',
    'idade_Parente',
    'ajuda_Despesa',
    'faixa_Salarial',
    'imp_Seguro',
    'tem_Seguro',
    'inv_Seguro',
    'logradouro',
    'cep',
    'complemento',
    'bairro',
    'cidade',
    'celular',
    'email',
    'dt_Nascimento');
    // Adiciona os dados das linhas
    while($row = $result->fetch_assoc()) {
        $databaseData[] = array(
         $row["numero_sorte"],
         $row["proposta"],
         $row["valor_sorteio"],
         $row["data_sorteio"],
         $row["nome"],
         $row["cpf"],
         $row["dt_Cadastro"],
         $row["consultor"],
         $row["idade"],
         $row["prof"],
         $row["estado_Civil"],
         $row["pessoas_Moram"],
         $row["parentesco"],
         $row["idade_Parente"],
         $row["ajuda_Despesa"],
         $row["faixa_Salarial"],
         $row["imp_Seguro"],
         $row["tem_Seguro"],
         $row["inv_Seguro"],
         $row["logradouro"],
         $row["cep"],
         $row["complemento"],
         $row["bairro"],
         $row["cidade"],
         $row["celular"],
         $row["email"],
         $row["dt_Nascimento"]);
    }
} else {
    echo "0 resultados";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
