<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo_aba.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <title>Riopae Para Dar Sorte</title>
    <link rel="stylesheet" href="Styles/sty.css">
    <link rel="stylesheet" href="Styles/stymenu.css">

</head>
<body>

<?php include './menu_Lateral.php'; ?>

<div class="container">

    
    <form id="formularioCampanha">
        
        <div id="clientes">
            <img src="logo.jpg" alt="Logo Riopae">
            <h2>Riopae Para Dar Sorte</h2>
            
            <div class="cliente">
                <hr class="separador">
    
                <h1 class="titulo">Cliente</h1>
                
                <!-- Campos Importantes Para Geração do TXT -->
                <div class="form-group">
                    <label for="numero_sorte">Número da Sorte:</label>
                    <input name="numero_sorte"
                        type="text"
                        maxlength="6" 
                        required oninput="this.value = this.value.replace(/\D/g,'')"
                    >
                </div> 
                
                <div class="form-group">
                    <label for="proposta">Proposta:</label>
                    <input name="proposta"
                        type="text"
                        maxlength="11"
                        required oninput="this.value = this.value.replace(/\D/g,'')"
                    ><br>
                </div> 
                
                <div class="form-group">                                       
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" maxlength="42" required>
                </div>  
                
                <div class="form-group">                                       
                    <label for="cpf">CPF:</label>
                    <input name="cpf"
                        type="text"
                        maxlength="15"
                        required oninput="this.value = this.value.replace(/\D/g,'')"
                    >
                </div>  

                <!-- ///////////////////////////////////-->
                <div class="form-group">                                       
                <label for="consultor">Consultor:</label>
                <input type="text" id="consultor" name="consultor" required>
                </div>  

                <hr class="separador">

                <h1 class="titulo">Dados do Entrevistado</h1>

                <div class="form-group">                                       
                <label for="idade">Idade:</label>
                <input type="text" id="idade" name="idade" required>
                </div>  

                <div class="form-group">                                       
                <label for="prof">Profissão:</label>
                <input type="text" id="prof" name="prof" required>
                </div>  

                <div class="form-group">                                       
                <label for="estado_Civil">Estado Civil:</label>
                <input type="text" id="estado_Civil" name="estado_Civil" required>
                </div>  
            
                <hr class="separador">

                <h1 class="titulo">Perguntas da Sorte</h1>

                <div class="form-group">                                       
                <label for="pessoas_Moram">Quem são as pessoas que moram com você?</label>
                <input type="text" id="pessoas_Moram" name="pessoas_Moram" required><br>
                </div>  

                <div class="form-group">                                       
                <label for="parentesco">Parentesco:</label>
                <input type="text" id="parentesco" name="parentesco" required>
                </div>  

                <div class="form-group">                                       
                <label for="idade_Parente">Idade:</label>
                <input type="text" id="idade_Parente" name="idade_Parente" required><br>
                </div>  

                <div class="form-group">                                       
                <label for="ajuda_Despesa">Ajuda na Despesa?</label>
                <select id="ajuda_Despesa" name="ajuda_Despesa" required>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
                </select>
                </div>  

                <div class="form-group">                                       
                <label for="faixa_Salarial">Faixa Salarial:</label>
                <input type="text" id="faixa_Salarial" name="faixa_Salarial" required>
                </div>  

                <div class="form-group">                                       
                <label for="imp_Seguro">Você acha que um seguro de vida ou uma assistência funeral ajudaria em uma situação de emergência?</label>
                <select id="imp_Seguro" name="imp_Seguro" required>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
                </div>  

                <div class="form-group">                                       
                <label for="tem_Seguro">Você tem ou teve seguro de vida ou uma assistência funeral?</label>
                <select id="tem_Seguro" name="tem_Seguro" required>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
                </div>  
            
                <div class="form-group">                                       
                <label for="inv_Seguro">Quanto você estaria disposto a investir na proteção e segurança da sua família?</label>
                <input type="text" id="inv_Seguro" name="inv_Seguro" required>
                </div>  

                <hr class="separador">

                <h1 class="titulo">Endereço do Entrevistado</h1>

                <div class="form-group">                                       
                <label for="logradouro">Logradouro:</label>
                <input type="text" id="logradouro" name="logradouro" required>
                </div>  
                
                <div class="form-group">                                       
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required>
                </div>  

                <div class="form-group">                                       
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento"><br>
                </div>  

                <div class="form-group">                                       
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" required>
                </div>  

                <div class="form-group">                                       
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required>
                </div>  

                <hr class="separador">

                <h1 class="titulo">Contato do Entrevistado</h1>

                <div class="form-group">                                       
                <label for="celular">Celular:</label>
                <input type="text" id="celular" name="celular" required>
                </div>  

                <div class="form-group">                                       
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
                </div>  

                <div class="form-group">                                       
                <label for="dt_Nascimento">Data de Nascimento:</label>
                <input type="date" id="dt_Nascimento" name="dt_Nascimento" required>
                </div>  
                
            </div>
            <button type="button" onclick="salvarClientes()">Salvar</button>
            <button type="button" id="emitir">Gerar TXT</button>
        </div>
        

    </form>
</div>
    <script src="JS/script.js"></script>
    <script>

function salvarClientes() {
    if (!validarCampos()) {
        return; // Retorna imediatamente se a validação falhar
    }

    var formData = new FormData(document.getElementById("formularioCampanha"));

    fetch('PHP/processar_formulario.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            return response.text(); // Retorna o conteúdo da resposta como texto
        } else {
            throw new Error('Erro na requisição.');
        }
    })
    .then(data => {
        alert(data); // Exibe a mensagem de sucesso ou erro retornada pelo PHP
        if (data === "Registro inserido com sucesso!") {
            document.getElementById("formularioCampanha").reset();
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao inserir registros: ' + error.message); // Exibe uma mensagem genérica de erro
    });
}

function validarCampos() {
    var camposObrigatorios = document.querySelectorAll('input[required], select[required], textarea[required]');
    var valido = true;

    camposObrigatorios.forEach(function(campo) {
        if (!campo.value.trim()) {
            campo.classList.add('campo-invalido');
            valido = false;
        } else {
            campo.classList.remove('campo-invalido');
        }
    });

    if (!valido) {
        alert('Por favor, preencha todos os campos obrigatórios.');
        return false;
    }

    // Verificar idade
    var dataNascimentoCampo = document.getElementById('dt_Nascimento');
    var idadeCampo = document.getElementById('idade');
    var dataNascimento = new Date(dataNascimentoCampo.value);
    var hoje = new Date();
    var idade = hoje.getFullYear() - dataNascimento.getFullYear();
    var mes = hoje.getMonth() - dataNascimento.getMonth();

    if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
        idade--;
    }

    if (idade < 18 || parseInt(idadeCampo.value) < 18) {
        alert('É necessário ser maior de 18 anos para prosseguir.');
        return false;
    }

    return true;
}



    </script>
</body>
</html>
