<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riopae Para Dar Sorte</title>
  <link rel="stylesheet" href="../Styles/stymenu.css">
  <link rel="stylesheet" href="../Styles/sty_pedido.css">
  <link rel="icon" href="../logo_aba.png" type="image/x-icon">
</head>
<body>
    <?php include './menu_Lateral.php'; ?>

    <div class="box_pedido">

        <form id="form_pedido">

            <h3>Pedido Massa</h3>

            <label for="quantidade">Quantidade do pedido:</label>
            <input name="quantidade"
                id="quantidade"
                type="text"
                maxlength="6" 
                required oninput="this.value = this.value.replace(/\D/g,'')"
            >

            <label for="data">Data do Sorteio:</label>
            <input type="date" id="data" name="data" required>

            <button type="submit" id="gerar_pedido" >Gerar Pedido</button>

        </form>

    </div>
    
    <script src="../JS/ger_pedido.js"></script>

</body>

</html>
