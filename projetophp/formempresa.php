<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Consulta de empresas</title>
    <link rel="stylesheet" href="CSS/adicionando.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body style="background-color: white;" onload="consultar()">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Cadastro Empresa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Formprod.php">Tabela de Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formuser.php">Tabela de Usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formempresa.php">Tabela de Empresa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formautonomo">Tabela de Autonomo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <h2>Cadastro de Empresas</h2>

    <button id="abrindoModalBtn">Clique para Inserir Dados</button>

   
    <div id="meuModalCadastro" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="fecharModalCadastroBtn">&times;</span>
            <h5>Cadastro de Empresas</h5>
            <input type="number" id="Cnpjempresa" placeholder="Cnpj" /><br> 
            <input type="text" id="Nomeempresa" placeholder="Nome da Empresa" /><br>    
            <input type="email" id="Emailempresa" placeholder="Email de contato" /><br>
            <input type="password"  id="Senhaempresa" placeholder="Senha da conta" /><br>   
            <input type="number" id="Cepempresa" placeholder="Cep" /><br>
            <input type="number" id="Contatoempresa" placeholder="Contato" /><br>
            <button onclick="cadastrar()">Cadastrar</button>
            <p id="resultadoCadastro"></p>
        </div>
    </div>

    <h2>Lista de empresas Cadastradas</h2>
    <div id="resultado">
        
    </div>

   
    <div id="meuModalAtualizacao" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="fecharModalAtualizacaoBtn">&times;</span>
            <h5>Atualização de empresas</h5>
            <input type="number" id="attCnpjempresa" placeholder="Cnpj" /><br>   
            <input type="text" id="attNomeempresa" placeholder="Nome da Empresa" /><br>    
            <input type="email" id="attEmailempresa" placeholder="Email de contato" /><br>
            <input type="password"  id="attSenhaempresa" placeholder="Senha da conta" /><br>    
            <input type="number" id="attCepempresa" placeholder="Cep" /><br>
            <input type="number" id="attContatoempresa" placeholder="Contato" /><br>
            <button onclick="salvarAtualizacao()">Atualizar</button>
            <p id="resultadoAtualizacao"></p>
        </div>
        </div>
    </div>
    <script src="JS/empresa.js"></script>
</body>
</html>
