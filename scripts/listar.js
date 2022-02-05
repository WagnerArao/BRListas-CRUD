
const tbody = document.querySelector("tbody");

const listarPessoas = async()=>{
    const dados = await fetch("./listar.php");
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarPessoas();