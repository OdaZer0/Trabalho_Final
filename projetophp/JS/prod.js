function consultar() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "controleprodutos.php?getProduto", true);
    xhttp.send();

    xhttp.onload = function() {
        var resposta = JSON.parse(this.responseText);
        var organizar = "<table border='1'><thead><tr><th>Nome</th><th>Preço</th><th>Descrição</th><th>Quantidade</th><th>Ações</th></tr></thead><tbody>";
        for (var i = 0; i < resposta.length; i++) {
            organizar += "<tr><td>" + resposta[i].Nome_produto + "</td>" +
                "<td>" + resposta[i].Preco_produto + "</td>" +
                "<td>" + resposta[i].Descricao_produto + "</td>" +
                "<td>" + resposta[i].Quantidade_produto + "</td>" +
                "<td>" +
                "<button onclick='atualizar(" + resposta[i].Id_produto + ")'>Atualizar</button>" +
                "<button onclick='apagar(" + resposta[i].Id_produto + ")'>Apagar</button>" +
                "</td></tr>";
        }
        organizar += "</tbody></table>";
        document.getElementById('resultado').innerHTML = organizar;
    }
}


function cadastrar() {
    var nome = document.getElementById("NomeProd").value;
    var preco = document.getElementById("PrecoProd").value;
    var desc = document.getElementById("DescProd").value;
    var quant = document.getElementById("QuantProd").value;

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "controleprodutos.php?cadProduto", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var data = "Nome=" + encodeURIComponent(nome) +
        "&Preco=" + encodeURIComponent(preco) +
        "&Descricao=" + encodeURIComponent(desc) +
        "&Quantidade=" + encodeURIComponent(quant);

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

function atualizar(idprod) {
const xhttp = new XMLHttpRequest();
xhttp.open("GET", "controleprodutos.php?getProduto", true);
xhttp.send();

xhttp.onload = function() {
var resposta = JSON.parse(this.responseText);
for (var i = 0; i < resposta.length; i++) {
    if (idprod == resposta[i].Id_produto) {
        document.getElementById("AttNomeProd").value = resposta[i].Nome_produto;
        document.getElementById("AttPrecoProd").value = resposta[i].Preco_produto;
        document.getElementById("AttDescProd").value = resposta[i].Descricao_produto;
        document.getElementById("AttQuantProd").value = resposta[i].Quantidade_produto;
        document.getElementById("AttIdProd").value = resposta[i].Id_produto; 
    }
}
document.getElementById("meuModalAtualizacao").style.display = "block"; 
};
}

function consultar() {
const xhttp = new XMLHttpRequest();
xhttp.open("GET", "controleprodutos.php?getProduto", true);
xhttp.send();

xhttp.onload = function() {
    var resposta = JSON.parse(this.responseText);
    var organizar = "<table border='1'><thead><tr><th>Nome</th><th>Preço</th><th>Descrição</th><th>Quantidade</th><th>Ações</th></tr></thead><tbody>";
    for (var i = 0; i < resposta.length; i++) {
        organizar += "<tr><td>" + resposta[i].Nome_produto + "</td>" +
            "<td>" + resposta[i].Preco_produto + "</td>" +
            "<td>" + resposta[i].Descricao_produto + "</td>" +
            "<td>" + resposta[i].Quantidade_produto + "</td>" +
            "<td>" +
            "<button onclick='atualizar(" + resposta[i].Id_produto + ")'>Atualizar</button>" + 
            "<button onclick='apagar(" + resposta[i].Id_produto + ")'>Apagar</button>" + 
            "</td></tr>";
    }
    organizar += "</tbody></table>";
    document.getElementById('resultado').innerHTML = organizar;
}
}



function salvarAtualizacao() {
var idprod = document.getElementById("AttIdProd").value; 
var nome = document.getElementById("AttNomeProd").value;
var preco = document.getElementById("AttPrecoProd").value;
var desc = document.getElementById("AttDescProd").value;
var quant = document.getElementById("AttQuantProd").value;

const xhttp = new XMLHttpRequest();
xhttp.open("POST", "controleprodutos.php?atuProduto", true);
xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


var data = "Id=" + encodeURIComponent(idprod) +
       "&Nome=" + encodeURIComponent(nome) +
       "&Preco=" + encodeURIComponent(preco) +
       "&Descricao=" + encodeURIComponent(desc) +
       "&Quantidade=" + encodeURIComponent(quant);

xhttp.send(data);

xhttp.onload = function() {
document.getElementById("resultadoAtualizacao").innerHTML = this.responseText;
consultar(); 
}

document.getElementById("meuModalAtualizacao").style.display = "none"; 
}

function apagar(idprod) {
if (confirm("Você tem certeza que deseja apagar este produto?")) {
const xhttp = new XMLHttpRequest();
xhttp.open("POST", "controleprodutos.php?delProduto", true);
xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

var data = "idprod=" + encodeURIComponent(idprod); 
xhttp.send(data);

xhttp.onload = function() {
    alert(this.responseText);
    consultar(); 
}
}
}