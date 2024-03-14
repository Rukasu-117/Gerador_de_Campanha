/*
Variavel clientes = numero_sorte, nome, proposta, cpf, data_sorteio;


*/

var formularioModule = (function() {

var clientes = []; // Array para armazenar os dados dos clientes

//Formatar a data para o modelo sem barras ex: 05111997
function formatarData(data) {
    var partesData = data.split('-'); // Divide a data em partes [ano, mês, dia]
    return partesData[2] + partesData[1] + partesData[0]; // Formatação para ddmmaa
}

function adicionarCliente() {
    // Realiza a chamada AJAX para buscar o sequencial
    fetch("PHP/buscar_Max_Num.php")
        .then(response => {
            if (!response.ok) {
                throw new Error('Falha ao buscar sequencial.');
            }
            return response.text();
        })
        .then(sequencial => {
            sequencial = sequencial.trim(); // Obtém o sequencial
            console.log("Sequencial obtido: " + sequencial);

            // Realiza a chamada AJAX para buscar os dados do cliente do banco de dados
            return fetch("PHP/buscar_Clientes_Sorteio.php");
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Falha ao buscar dados do cliente.');
            }
            return response.json();
        })
        .then(dadosCliente => {
            console.log("Dados do cliente obtidos: ", dadosCliente);

            // Verifica se os dados do cliente foram obtidos corretamente
            if (!dadosCliente || !dadosCliente.nome || !dadosCliente.proposta || !dadosCliente.cpf || !dadosCliente.numero_sorte) {
                throw new Error('Erro ao obter dados do cliente.');
            }

            // Adiciona o sequencial aos dados do cliente
            dadosCliente.sequencial = sequencial;

            // Envia os dados do cliente para o servidor
            return fetch('PHP/salvar_Campanha.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dadosCliente)
            });
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Falha ao adicionar cliente.');
            }
            alert('Cliente adicionado com sucesso!');
            limparCampos();
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro ao adicionar cliente. Por favor, tente novamente mais tarde.');
        });
}

//Busca somente os clientes dentro do mes anterior da geração
function buscarClientes() {
    return fetch('PHP/buscar_Clientes_Sorteio.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Falha ao buscar clientes.');
            }
            return response.json();
        });
}

//Formata os dados vindos do banco para que apos formatado insira na variavel dadosFormatados
function formatarDados(clientes) {
    const dadosFormatados = clientes.map(cliente => {
        const cpfFormatado = cliente.cpf.padStart(15, '0'); // Formata o CPF para que ele preencha com 0 a frente da informação até completar 15 Caracteres
        const dataSorteioFormatada = formatarData(cliente.data_sorteio); // Certifique-se de que o campo da data esteja correto
        const numerosorteFormatada = ('000000' + cliente.numero_sorte).slice(-6); // Formata o numero cliente para ficar com a mascara 000001
        const propostaFormatada = ('00000000000'+ cliente.proposta).slice(-11);
        return `D000${numerosorteFormatada}${cliente.nome.padEnd(50)}\t${cpfFormatado}\t${dataSorteioFormatada}${propostaFormatada}${cliente.valor_sorteio}\n`;
    }).join('');
    return dadosFormatados;
}

var sequencial_arquivo; // Declare a variável globalmente

//Responsavel por gerar o arquivo com os dados formatados corretamente
function gerarArquivoDeClientes(dadosFormatados) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "PHP/buscar_Max_Num.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var sequencial = xhr.responseText.trim();
            sequencial_arquivo = sequencial;

            const dataAtual = new Date().toLocaleDateString().replace(/\//g, '');
            const quantidadeClientes = clientes.length;
            const TotalClientesFormatado = ('000000' + quantidadeClientes).slice(-6);
            const num_Arquivo = ('000000' + sequencial_arquivo).slice(-6);
            const blob = new Blob([
                `HATIVOS`.padEnd(10) +
                '\t' +
                'RIOPAE'.padEnd(15) +
                '26836208000139' +
                dataAtual +
                num_Arquivo + //Numero do Arquivo 
                'A694' +
                '\n' +
                formatarDados(clientes) +
                'T' +
                TotalClientesFormatado
            ], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'ATIVOSCCCCSSSSSS.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            // Enviar sequencial para o PHP para inserção no banco de dados
            const formData = new FormData();
            formData.append('sequencial', sequencial);
            fetch('PHP/inserir_sequencial.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao enviar sequencial para o servidor.');
                }
                console.log('Sequencial enviado com sucesso.');
            })
            .catch(error => {
                console.error('Erro:', error);
            });
        }
    };
    xhr.send();
}

//Função que ao clicar no botão para gerar ele inicia o processo de geração do arquivo.
function emitirDados() {
    buscarClientes()
        .then(clientesDoServidor => {
            if (clientesDoServidor.length === 0) {
                throw new Error('Nenhum cliente encontrado no banco de dados.');
            }
            // Adicionar os clientes do servidor ao array clientes
            clientes = clientesDoServidor;
            // Gerar o arquivo de clientes com os dados obtidos
            const dadosFormatados = formatarDados(clientes);
            gerarArquivoDeClientes(dadosFormatados);
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro ao emitir os dados: ' + error.message);
        });
}


// Expondo as funções publicamente
return {
    adicionarCliente: adicionarCliente,
    emitirDados: emitirDados
};

})();

// Event Listeners
document.getElementById('emitir').addEventListener('click', formularioModule.emitirDados);
