const carregamento = document.getElementById("carregamento");

window.addEventListener("load", () => {
    carregamento.classList.add("carregamento_active");
})

const hero = document.getElementById("hero");
const hero_img = document.querySelector(".hero_img");
const tamanho_tela = window.innerWidth;
var animation_title_sinal = false;

const produtos_title = document.querySelector(".produtos_title");
const nav_links = document.querySelector(".nav_links");

// gsap.to(produtos_title, {
//     scrollTrigger: {
//         trigger: produtos_title,
//         start: "top center",
//         end: "bottom center",
//         scrub: true,

//         onUpdate: (self) => {
//             const progress = self.progress;

//             for (let i = 1; i <= 14; i++) {
//                 if (progress >= 0.1) {
//                     document.querySelector(`.psp${i}`).classList.remove(`animation_title2_${i}`);
//                     document.querySelector(`.psp${i}`).classList.add(`animation_title_${i}`);
//                 } else {
//                     document.querySelector(`.psp${i}`).classList.remove(`animation_title_${i}`);
//                     document.querySelector(`.psp${i}`).classList.add(`animation_title2_${i}`);
//                 }
//             }
//         }
//     }
// })

let scroll_antes = 0;
window.addEventListener("scroll", () => {
    let scroll_atual = window.scrollY;

    if (scroll_atual > 50) {
        nav.style.background = "#eeeded";
        if (scroll_atual > scroll_antes) {
            nav_links.classList.add("nav_hidden");
        } else {
            nav_links.classList.remove("nav_hidden");
        }
    } else {
        nav.style.background = "transparent";
        nav_links.classList.remove("nav_hidden");
    }

    scroll_antes = scroll_atual;
})

var links = {};
var itens = {};

for (let i = 1; i <= 4; i++) {
    links[`link_${i}`] = document.querySelector(`.link_${i}`);
    itens[`item_${i}`] = document.querySelector(`.item_${i}`);
}

function nav_setas(links, itens) {
    links.addEventListener("mouseenter", () => {
        itens.classList.add("itens_active");
    })
    links.addEventListener("mouseleave", () => {
        itens.classList.remove("itens_active");
    })
}
for (let i = 1; i <= 4; i++) {
    nav_setas(links[`link_${i}`], itens[`item_${i}`]);
}

const nav = document.getElementById("nav");
const header = document.querySelector(".header");
const hero_img_content = document.querySelector(".hero_img_content");




const client = document.querySelector(".client_logo");
const desc_img_content = document.querySelector(".desc_img_content");

const login_btn = document.querySelector(".log_btn");

login_btn.addEventListener("click", (async evento => {
    evento.preventDefault();

    let Carrinho_sem_conta_json = JSON.stringify(Carrinho_sem_conta);
    localStorage.setItem("Carrinho_sem_conta", Carrinho_sem_conta_json);
    console.log("Carrinho sem conta", JSON.parse(localStorage.getItem("Carrinho_sem_conta")));

    window.location.href = "http://localhost/loja/login/login.php";
}))

const perfil_btn = document.querySelector(".btn_prefil");
const perfil_menu = document.querySelector(".menu_perfil");

if (perfil_btn) {
    perfil_btn.addEventListener("click", () => {
        if (!perfil_menu.classList.contains("active")) {
            perfil_menu.classList.add("active");
        } else {
            perfil_menu.classList.remove("active");
        }

        nav.style.backgroundColor = "#ececec"

    })
}


const posi = localStorage.getItem("posi");
console.log(posi)

if (posi) {
    document.documentElement.style.scrollBehavior = "auto";
    window.scrollTo(0, posi);
    setTimeout(() => {
        document.documentElement.style.scrollBehavior = "smooth";
    }, 100)
    localStorage.removeItem("posi");
}



