
function consultar() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "controleUser.php?getPessoa", true);
    xhttp.send();

    xhttp.onload = function() {
        var resposta = JSON.parse(this.responseText);
        var organizar = "<table border='1'><thead><tr><th>Nome</th><th>Email</th><th>Senha</th><th>Cep</th><th>Cpf</th><th>Ações</th></tr></thead><tbody>";
        for (var i = 0; i < resposta.length; i++) {
            organizar += "<tr><td>" + resposta[i].Nome_usuario + "</td>" +
                "<td>" + resposta[i].Email_usuario + "</td>" +
                "<td>" + resposta[i].Senha_usuario + "</td>" +
                "<td>" + resposta[i].Cep_usuario + "</td>" +
                "<td>" + resposta[i].Cpf_usuario + "</td>" +
                "<td>" +
                "<button onclick='atualizar(" + resposta[i].Cpf_usuario + ")'>Atualizar</button>" +
                "<button onclick='apagar(" + resposta[i].Cpf_usuario + ")'>Apagar</button>" +
                "</td></tr>";
        }
        organizar += "</tbody></table>";
        document.getElementById('resultado').innerHTML = organizar;
    }
}


function cadastrar() {
    var Nome = document.getElementById("NomeUser").value;
    var Email = document.getElementById("EmailUser").value;
    var Senha = document.getElementById("SenhaUser").value;
    var Cep = document.getElementById("CepUser").value;
    var Cpf = document.getElementById("CpfUser").value;
 
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "controleUser.php?cadPessoa", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var data = "Nome=" + encodeURIComponent(Nome) +
    "&Email=" + encodeURIComponent(Email) +
    "&Senha=" + encodeURIComponent(Senha) +
    "&Cep=" + encodeURIComponent(Cep) +
    "&Cpf=" + encodeURIComponent(Cpf);



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
    xhttp.open("GET", "controleUser.php?getPessoa", true);
    xhttp.send();

    xhttp.onload = function() {
        var pessoas = JSON.parse(this.responseText);
        for (var i = 0; i < pessoas.length; i++) {
            if(cpf == pessoas[i].Cpf_usuario){
               
                document.getElementById("NomeUseratt").value = pessoas[i].Nome_usuario; 
                document.getElementById("EmailUseratt").value = pessoas[i].Email_usuario;
                document.getElementById("SenhaUseratt").value = pessoas[i].Senha_usuario;
                document.getElementById("CepUseratt").value = pessoas[i].Cep_usuario;
                document.getElementById("CpfUseratt").value = pessoas[i].Cpf_usuario;
            }
        }
       
        var modalAtualizacao = document.getElementById("meuModalAtualizacao");
        modalAtualizacao.style.display = "block";
    };
}

function salvarAtualizacao() {
var Nome = document.getElementById("NomeUseratt").value;
var Email = document.getElementById("EmailUseratt").value;
var Senha = document.getElementById("SenhaUseratt").value;
var Cep = document.getElementById("CepUseratt").value;
var Cpf = document.getElementById("CpfUseratt").value;

const xhttp = new XMLHttpRequest();
xhttp.open("POST", "controleUser.php?atuPessoa", true);
xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

var data = "Nome=" + encodeURIComponent(Nome) +
    "&Email=" + encodeURIComponent(Email) +
    "&Senha=" + encodeURIComponent(Senha) +
    "&Cep=" + encodeURIComponent(Cep) +
    "&Cpf=" + encodeURIComponent(Cpf);

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
xhttp.open("POST", "controleUser.php?delPessoa", true);
xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

var data = "Cpf=" + encodeURIComponent(cpf);  

xhttp.send(data);

xhttp.onload = function() {
    alert(this.responseText);
    consultar(); 


}
}
}

