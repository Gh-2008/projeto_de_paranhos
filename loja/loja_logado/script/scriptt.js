


console.log(carrinho_com_conta_logado);
carrinho_produtos.innerHTML += carrinho_com_conta_logado;
let tamanho_carrinho = carrinho_com_conta_logado.length;

for (let i = 0; i < tamanho_carrinho; i++) {
    if (carrinho_com_conta_logado[i].img_prod){
        console.log(carrinho_com_conta_logado[i].img_prod)
    }
}
