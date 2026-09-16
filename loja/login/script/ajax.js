const senha = document.getElementById("senha");
const estado = document.getElementById("estado");
const cidade = document.getElementById("cidade");
const nome = document.getElementById("nome");
const bairro = document.getElementById("bairro");
const rua = document.getElementById("rua");
const numero = document.getElementById("numero");
const cep = document.getElementById("cep");
const cpf = document.getElementById("cpf");
const email = document.getElementById("email");
const confirmarsenha = document.getElementById("confirmarsenha");
const cad_conclu = document.querySelector(".cad_conclu");

const form_cadastro = document.getElementById("cadform");
const form_login = document.getElementById("logform");
const resposata_cad = document.getElementById("resposta_cad");

function ajax(form_id, php_docs, resposta_cont,) {
    if (!form_id) return;

    let botaoClicado = null;

    form_id.querySelectorAll("input[type=submit]").forEach(btn => {
        btn.addEventListener("click", function () {
            botaoClicado = this.name;
        });
    });
    console.log(form_login);
    console.log("batata");

    form_id.addEventListener("submit", async function (e) {
        e.preventDefault();

        let dados = new FormData(this);

        if (botaoClicado) {
            dados.append(botaoClicado, true);
        }

        try {
            let resposta = await fetch(php_docs, {
                method: "POST",
                body: dados
            });

            let retorno = await resposta.text();

            if (retorno.includes("REDIRECT:")) {
                const url = retorno.replace("REDIRECT:", "").trim();
                window.location.href = url;
                return;
            }

            const resposta_cont_ = document.getElementById(resposta_cont);
            resposta_cont_.innerHTML = retorno;

            if (retorno.includes("Cadastrdo")) {
                nome.value = "";
                bairro.value = "";
                email.value = "";
                rua.value = "";
                cidade.value = "";
                cep.value = "";
                cpf.value = "";
                senha.value = "";
                confirmarsenha.value = "";
                numero.value = "";
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
        }
    });
}
ajax(form_cadastro, "processa_cad.php", "resposta_cad");
ajax(form_login, "processa_login.php", "resposta_login");

let cidade_carregada = false;

async function adicionar_cidades() {
    cidade.innerHTML = "<option value=''>Carregando...</option>";

    const resposta = await fetch(
        `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estado.value}/municipios`
    );

    const dados = await resposta.json();
    let cidades = "<option value=''>Selecione uma cidade</option>";

    dados.forEach(municipio => {
        cidades += `
            <option value="${municipio.nome}">
                ${municipio.nome}
            </option>
        `;
    });

    cidade.innerHTML = cidades;
    cidade_carregada = true;
}

estado.addEventListener("change", () => {
    adicionar_cidades();
});

cep.addEventListener("blur", async () => {
    if (cep.value == ""){
        return;
    }
    const valorCep = cep.value.replace(/\D/g, "");

    const resposta = await fetch(
        `https://viacep.com.br/ws/${valorCep}/json/`
    );

    const dados = await resposta.json();
    console.log(dados);

    if (dados.erro) {
        resposata_cad.innerHTML = "CEP não encontrado";
        return;
    }

    estado.value = dados.uf;

    await adicionar_cidades();

    cidade.value = dados.localidade;
    bairro.value = dados.bairro;
    rua.value = dados.logradouro;
});


const observer = new MutationObserver((mutacoes) => {

    const resposta_cont_ = document.getElementById("resposta_cad");
    resposta_cont_.classList.add("resposta_animation");

    setTimeout(() => {
        resposta_cont_.classList.remove("resposta_animation");
    }, 500)
});

observer.observe(resposata_cad, {
    childList: true,      
    characterData: true
});