function cadastrar() {
    var Cnpj = document.getElementById("Cnpjempresa").value;  
    var Nome = document.getElementById("Nomeempresa").value;
    var Email = document.getElementById("Emailempresa").value;
    var Senha = document.getElementById("Senhaempresa").value;
    var Cep = document.getElementById("Cepempresa").value;
    var Contato = document.getElementById("Contatoempresa").value;  

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "controleempresa.php?cadPessoa", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var data = "Cnpj=" + encodeURIComponent(Cnpj) +
               "&Nome=" + encodeURIComponent(Nome) +
               "&Email=" + encodeURIComponent(Email) +
               "&Senha=" + encodeURIComponent(Senha) +
               "&Cep=" + encodeURIComponent(Cep) +
               "&Contato=" + encodeURIComponent(Contato);

    xhttp.send(data);

    xhttp.onload = function() {
        document.getElementById("resultadoCadastro").innerHTML = this.responseText;
        consultar(); 
    }
}


        
        var modalCadastro = document.getElementById("meuModalCadastro");
        var btnCadastro = document.getElementById("abrindoModalBtn");
        var spanCadastro = document.getElementById("fecharModalCadastroBtn");

        btnCadastro.onclick = function() {
            modalCadastro.style.display = "block";
        }

       
        spanCadastro.onclick = function() {
            modalCadastro.style.display = "none";
        }

    
        window.onclick = function(event) {
            if (event.target == modalCadastro) {
                modalCadastro.style.display = "none";
            }
        }

        function consultar() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "controleempresa.php?getPessoa", true);
    xhttp.send();

    xhttp.onload = function() {
        var resposta = JSON.parse(this.responseText);
        var organizar = "<table border='1'><thead><tr><th>CNPJ</th><th>Nome</th><th>Email</th><th>Senha</th><th>Cep</th><th>Contato</th><th>Ações</th></tr></thead><tbody>";
        for (var i = 0; i < resposta.length; i++) {
            organizar += "<tr><td>"+ resposta[i].Cnpj_empresa +
                        "</td><td>" + resposta[i].Nome_empresa + "</td>" +
                        "<td>" + resposta[i].Email_empresa + "</td>" +
                        "<td>" + resposta[i].Senha_empresa + "</td>" +
                        "<td>" + resposta[i].Cep_empresa + "</td>" +
                        "<td>" + resposta[i].Contato_empresa + "</td>" +
                        "<td>" +
                        "<button onclick='atualizar(" + resposta[i].Cnpj_empresa + ")'>Atualizar</button>" +
                        "<button onclick='apagar(" + resposta[i].Cnpj_empresa + ")'>Apagar</button>" +
                        "</td></tr>";
        }
        organizar += "</tbody></table>";
        document.getElementById('resultado').innerHTML = organizar;
    }
}

function atualizar(cnpj) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "controleempresa.php?atuPessoa&cnpj=" + cnpj, true);  
    xhttp.send();

    xhttp.onload = function() {
        var empresa = JSON.parse(this.responseText);
        if (empresa) {
            
            document.getElementById("attCnpjempresa").value = empresa.Cnpj_empresa;
            document.getElementById("attNomeempresa").value = empresa.Nome_empresa;
            document.getElementById("attEmailempresa").value = empresa.Email_empresa;
            document.getElementById("attSenhaempresa").value = empresa.Senha_empresa;
            document.getElementById("attCepempresa").value = empresa.Cep_empresa;
            document.getElementById("attContatoempresa").value = empresa.Contato_empresa;
        }
        var modalAtualizacao = document.getElementById("meuModalAtualizacao");
        modalAtualizacao.style.display = "block";
    };
}

function salvarAtualizacao() {
    var Cnpj = document.getElementById("attCnpjempresa").value;  
    var Nome = document.getElementById("attNomeempresa").value;
    var Email = document.getElementById("attEmailempresa").value;
    var Senha = document.getElementById("attSenhaempresa").value;
    var Cep = document.getElementById("attCepempresa").value;
    var Contato = document.getElementById("attContatoempresa").value;

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "controleempresa.php?atuPessoa", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var data = "Cnpj=" + encodeURIComponent(Cnpj) +
               "&Nome=" + encodeURIComponent(Nome) +
               "&Email=" + encodeURIComponent(Email) +
               "&Senha=" + encodeURIComponent(Senha) +
               "&Cep=" + encodeURIComponent(Cep) +
               "&Contato=" + encodeURIComponent(Contato);

    xhttp.send(data);

    xhttp.onload = function() {
        document.getElementById("resultadoAtualizacao").innerHTML = this.responseText;
        consultar();  
    }

    var modalAtualizacao = document.getElementById("meuModalAtualizacao");
    modalAtualizacao.style.display = "none";  
}





function apagar(cnpj) {
    if (confirm("Você tem certeza que deseja apagar?")) {
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "controleempresa.php?delPessoa", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var data = "Cnpj=" + encodeURIComponent(cnpj);  
        xhttp.send(data);

        xhttp.onload = function() {
            alert(this.responseText);
            consultar();  
        }
    }
}
