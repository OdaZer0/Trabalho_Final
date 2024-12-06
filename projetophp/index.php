<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="containerindex">
        <h1 id="principal-title">Bem-vindo ao sistema de cadastro, escolha uma opção</h1>
        <div class="button-container">
            <button class="form-button" id="autonomo-btn" onclick="window.location.href='Formautonomo.php';">Form de Autônomo</button>
            <button class="form-button" id="user-btn" onclick="window.location.href='formuser.php';">Form de Usuário</button>
            <button class="form-button" id="produto-btn" onclick="window.location.href='Formprod.php';">Form de Produto</button>
            <button class="form-button" id="empresa-btn" onclick="window.location.href='formempresa.php';">Form de Empresa</button>
        </div>
    </div>
</body>
</html>
