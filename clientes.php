<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Busca de Clientes</title>
</head>
<body>
    <h2>Buscar Cliente</h2>
    <form id="formBusca">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        <button type="submit" id="btnBuscar">Buscar</button>
    </form>
    <div id="resultado"></div>

    <script>
        document.getElementById("formBusca").addEventListener("submit", function(event) {
            event.preventDefault();
            var cpf = document.getElementById("cpf").value;
            var nome = document.getElementById("nome").value;
            
            if (cpf === '' && nome === '') {
                alert("Por favor, preencha pelo menos um dos campos (CPF ou Nome).");
                return;
            }

            buscarClientes(cpf, nome);
        });

        function buscarClientes(cpf, nome) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        document.getElementById("resultado").innerHTML = xhr.responseText;
                    } else {
                        console.error('Erro na requisição: ' + xhr.status);
                    }
                }
            };
            xhr.open("GET", "../PHP/filtro_clientes.php?cpf=" + cpf + "&nome=" + nome, true);
            xhr.send();
        }
    </script>
</body>
</html>
