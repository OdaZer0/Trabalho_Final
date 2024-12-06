function consultar() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "controleautonomo.php?getPessoa", true);
    xhttp.send();

    xhttp.onload = function() {
        var resposta = JSON.parse(this.responseText);
        var organizar = "<table border='1'><thead><tr><th>CPF</th><th>Nome</th><th>Email</th><th>Área</th><th>Contato</th><th>Ações</th></tr></thead><tbody>";
        for (var i = 0; i < resposta.length; i++) {
            organizar += "<tr><td>" + resposta[i].Cpf_autonomo + "</td>" +
                "<td>" + resposta[i].Nome_autonomo + "</td>" +
                "<td>" + resposta[i].Email_autonomo + "</td>" +
                "<td>" + resposta[i].Area_atuacao_autonomo + "</td>" +
                "<td>" + resposta[i].Contato_autonomo + "</td>" +
                "<td>" +
                "<button onclick='atualizar(" + resposta[i].Cpf_autonomo + ")'>Atualizar</button>" +
                "<button onclick='apagar(" + resposta[i].Cpf_autonomo + ")'>Apagar</button>" +
                "</td></tr>";
        }
        organizar += "</tbody></table>";
        document.getElementById('resultado').innerHTML = organizar;
    }
}

function cadastrar() {
    var cpf = document.getElementById("cpfCadastro").value;
    var nome = document.getElementById("nomeCadastro").value;
    var email = document.getElementById("emailCadastro").value;
    var senha = document.getElementById("senhaCadastro").value;
    var area = document.getElementById("areaCadastro").value;
    var contato = document.getElementById("contatoCadastro").value;

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "controleautonomo.php?cadPessoa", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var data = "cpf=" + encodeURIComponent(cpf) +
        "&nome=" + encodeURIComponent(nome) +
        "&email=" + encodeURIComponent(email) +
        "&senha=" + encodeURIComponent(senha) +
        "&area=" + encodeURIComponent(area) +
        "&contato=" + encodeURIComponent(contato);

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

function atualizar(cpf) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "controleautonomo.php?getPessoa", true);
    xhttp.send();

    xhttp.onload = function() {
        var pessoas = JSON.parse(this.responseText);
        for (var i = 0; i < pessoas.length; i++) {
            if(cpf == pessoas[i].Cpf_autonomo){
                document.getElementById("cpfAtualizacao").value = pessoas[i].Cpf_autonomo; 
                document.getElementById("nomeAtualizacao").value = pessoas[i].Nome_autonomo;
                document.getElementById("emailAtualizacao").value = pessoas[i].Email_autonomo;
                document.getElementById("senhaAtualizacao").value = pessoas[i].Senha_autonomo;
                document.getElementById("areaAtualizacao").value = pessoas[i].Area_atuacao_autonomo;
                document.getElementById("contatoAtualizacao").value = pessoas[i].Contato_autonomo;
            }
        }
        var modalAtualizacao = document.getElementById("meuModalAtualizacao");
        modalAtualizacao.style.display = "block";
    };
}

function salvarAtualizacao() {
    var cpf = document.getElementById("cpfAtualizacao").value;
    var nome = document.getElementById("nomeAtualizacao").value;
    var email = document.getElementById("emailAtualizacao").value;
    var senha = document.getElementById("senhaAtualizacao").value;
    var area = document.getElementById("areaAtualizacao").value;
    var contato = document.getElementById("contatoAtualizacao").value;

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "controleautonomo.php?atuPessoa", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var data = "cpf=" + encodeURIComponent(cpf) +
        "&nome=" + encodeURIComponent(nome) +
        "&senha=" + encodeURIComponent(senha) +
        "&area=" + encodeURIComponent(area) +
        "&contato=" + encodeURIComponent(contato) +
        "&email=" + encodeURIComponent(email);

    xhttp.send(data);

    xhttp.onload = function() {
        document.getElementById("resultadoAtualizacao").innerHTML = this.responseText;
        consultar();  
    }

    var modalAtualizacao = document.getElementById("meuModalAtualizacao");
    modalAtualizacao.style.display = "none";
}

function apagar(cpf) {
    if (confirm("Você tem certeza que deseja apagar?")) {
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "controleautonomo.php?delPessoa", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var data = "cpf=" + encodeURIComponent(cpf);
        xhttp.send(data);

        xhttp.onload = function() {
            alert(this.responseText);
            consultar();  
        }
    }
}
