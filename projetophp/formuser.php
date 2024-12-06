<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/adicionando.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body style="background-color: white;" onload="consultar()">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Cadastro Usuários</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Formprod.php">Tabela de Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formuser.php">Tabela de Usuário </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formempresa.php">Tabela de Empresa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formautonomo">Tabela de Autônomos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <h2>Cadastro de Usuário</h2>

    <button id="abrindoModalBtn">Clique para Inserir Dados</button>

   
    <div id="meuModalCadastro" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="fecharModalCadastroBtn">&times;</span>
            <h5>Cadastro de User</h5>
            <input type="text" id="NomeUser" placeholder="Nome de Usuario" /><br>    
            <input type="text" id="EmailUser" placeholder="Digite seu e-mail" /><br>
            <input type="password" id="SenhaUser" placeholder="Senha" /><br> 
            <input type="number" id="CepUser" placeholder="Digite seu Cep" /><br>    
            <input type="number"id="CpfUser" placeholder="Digite seu CPF" /><br>
            <button onclick="cadastrar()">Cadastrar</button>
            <p id="resultadoCadastro"></p>
        </div>
    </div>

    <h2>Lista de Usuários Cadastrados</h2>
    <div id="resultado">
        
    </div>

   
    <div id="meuModalAtualizacao" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="fecharModalAtualizacaoBtn">&times;</span>
            <h5>Atualização de User</h5>
            <input type="text" id="NomeUseratt" placeholder="Nome de Usuario" /><br>    
            <input type="text" id="EmailUseratt" placeholder="Digite seu e-mail" /><br>
            <input type="password" id="SenhaUseratt" placeholder="Senha" /><br> 
            <input type="number" id="CepUseratt" placeholder="Digite seu Cep" /><br>    
            <input type="number"id="CpfUseratt" placeholder="Digite seu CPF" /><br>
            <button onclick="salvarAtualizacao()">Atualizar</button>
            <p id="resultadoAtualizacao"></p>
        </div>
        </div>
    </div>
    <script src="JS/user.js"></script>

</body>
</body>
</html>