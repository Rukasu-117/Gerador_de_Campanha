<?php
require_once 'connect_DB.php';

// Recuperar dados do formulário e escapar caracteres especiais
$numero_sorte = $conn->real_escape_string($_POST['numero_sorte']);
$proposta = $conn->real_escape_string($_POST['proposta']);
$nome = $conn->real_escape_string($_POST['nome']);
$cpf = $conn->real_escape_string($_POST['cpf']);
$consultor = $conn->real_escape_string($_POST['consultor']);
$idade = $conn->real_escape_string($_POST['idade']);
$prof = $conn->real_escape_string($_POST['prof']);
$estado_Civil = $conn->real_escape_string($_POST['estado_Civil']);
$pessoas_Moram = $conn->real_escape_string($_POST['pessoas_Moram']);
$parentesco = $conn->real_escape_string($_POST['parentesco']);
$idade_Parente = $conn->real_escape_string($_POST['idade_Parente']);
$ajuda_Despesa = $conn->real_escape_string($_POST['ajuda_Despesa']);
$faixa_Salarial = $conn->real_escape_string($_POST['faixa_Salarial']);
$imp_Seguro = $conn->real_escape_string($_POST['imp_Seguro']);
$tem_Seguro = $conn->real_escape_string($_POST['tem_Seguro']);
$inv_Seguro = $conn->real_escape_string($_POST['inv_Seguro']);
$logradouro = $conn->real_escape_string($_POST['logradouro']);
$cep = $conn->real_escape_string($_POST['cep']);
$complemento = $conn->real_escape_string($_POST['complemento']);
$bairro = $conn->real_escape_string($_POST['bairro']);
$cidade = $conn->real_escape_string($_POST['cidade']);
$celular = $conn->real_escape_string($_POST['celular']);
$email = $conn->real_escape_string($_POST['email']);
$dt_Nascimento = $conn->real_escape_string($_POST['dt_Nascimento']);



// Verificar se CPF já existe
$sql_verificar_cpf = "SELECT cpf FROM campanha WHERE cpf = '$cpf'";
$result_cpf = $conn->query($sql_verificar_cpf);
// Verificar se número de sorte já existe
$sql_verificar_numero_sorte = "SELECT numero_sorte FROM campanha WHERE numero_sorte = '$numero_sorte'";
$result_numero_sorte = $conn->query($sql_verificar_numero_sorte);

if ($result_numero_sorte->num_rows > 0 || $result_cpf-> num_rows > 0) {
    echo "O CPF ou Numero da Sorte já existe.";
    $conn->close();
    exit();
}else{
// Preparar a consulta SQL para inserir os dados na tabela campanha

$sql = "INSERT INTO campanha (
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

)
VALUES 
(
    '$numero_sorte',
    '$proposta',
    '1219111',
    NOW(),
    '$nome',
    '$cpf',
    NOW(),
    '$consultor',
    '$idade',
    '$prof',
    '$estado_Civil',
    '$pessoas_Moram',
    '$parentesco',
    '$idade_Parente',
    '$ajuda_Despesa',
    '$faixa_Salarial',
    '$imp_Seguro',
    '$tem_Seguro',
    '$inv_Seguro',
    '$logradouro',
    '$cep',
    '$complemento',
    '$bairro',
    '$cidade',
    '$celular',
    '$email',
    '$dt_Nascimento'
)";


}


// Executar a consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro:  . $conn->error . ";
}

// Fechar conexão com o banco de dados
$conn->close();
?>
