document.getElementById("form_pedido").addEventListener("submit", function(event) {

    event.preventDefault();
    var data_atual = new Date();
    var dia_atual = String(data_atual.getDate()).padStart(2, '0');
    var mes_atual = String(data_atual.getMonth() + 1).padStart(2, '0'); // Os meses começam do zero, então adicionamos 1
    var ano_atual = String(data_atual.getFullYear()).substr(-4); // Pegar os últimos quatro dígitos do ano 

    var data_formatada_atual = dia_atual+mes_atual+ano_atual;
    var quantidade = document.getElementById("quantidade").value;
    var data_sorteio = document.getElementById("data").value;

    var partesData = data_sorteio.split('-'); // Divide a data em partes [ano, mês, dia]
    var dataSorteioFormatada =  partesData[2] + partesData[1] + partesData[0]; // Formatação para ddmmaa

    var quantidade_formatada = ("0000000000000000000000000000000000000000000000000" + quantidade).slice(-49);
    var texto = "HPEDIDO".padEnd(12) +
    "RIOPAE".padEnd(14) +
    "26836208000139" +
    data_formatada_atual.padEnd(7) +
    "000001".padEnd(5) + // mudar para formato de 000000
    "A694".padEnd(220) +
    '\n' +
    "D000000" +
    "00000000".padEnd(100) +
    dataSorteioFormatada.padEnd(16) + 
    "Q"+
    quantidade_formatada.padEnd(82) +
    '\n' +
    "T00000003".padEnd(268) +

    arguments

         ;
  
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(texto));
    element.setAttribute('download', 'PEDIDOCCCCSSSSSS.txt');
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);

    alert('Arquivo Gerado com Sucesso');

    document.getElementById("form_pedido").reset();

  });
  