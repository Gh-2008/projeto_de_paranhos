

// carrossel

const carrossel_container = document.querySelector(".carrossel_container");
const next = document.querySelector(".next");
const back = document.querySelector(".back");

const marker_1 = document.querySelector(".m_1");
const marker_2 = document.querySelector(".m_2");
const marker_3 = document.querySelector(".m_3");

const hero_btn = document.querySelector(".hero_btn");

let cont_banner = 1;

let translate_next = -200;
let btn_click = false;

next.addEventListener("click", () => {

    if (btn_click) {
        return
    }

    btn_click = true;

    carrossel_container.style.transition = "0.3s";
    carrossel_container.style.transform += `translate(${translate_next}vw)`
    translate_next = -100;
    cont_banner += 1;
    translate_back = 100;

    if (cont_banner == 4) {
        setTimeout(() => {
            carrossel_container.style.transition = "0s";
            carrossel_container.style.transform = `translateX(-100vw)`
            cont_banner = 1;
            translate_next = -100;
        }, 300);
    }

    if (cont_banner == 2) {
        marker_1.classList.remove("marker_active");
        marker_2.classList.add("marker_active");
    }
    if (cont_banner == 3) {
        marker_2.classList.remove("marker_active");
        marker_3.classList.add("marker_active");
    }
    if (cont_banner == 1 || cont_banner == 4) {
        marker_3.classList.remove("marker_active");
        marker_1.classList.add("marker_active");
    }

    hero_btn.classList.add("hero_btn_active");

    setTimeout(() => {
        btn_click = false;
        hero_btn.classList.remove("hero_btn_active");
    }, 500);
})

let translate_back = 0;

back.addEventListener("click", () => {

    if (btn_click) { return };

    btn_click = true;

    carrossel_container.style.transition = "0.3s";
    carrossel_container.style.transform += `translateX(${translate_back}vw)`;
    translate_back = 100;
    cont_banner -= 1;
    translate_next = -100;

    if (cont_banner == 0) {
        setTimeout(() => {
            carrossel_container.style.transition = "0s";
            carrossel_container.style.transform = `translateX(${-300}vw)`;
            cont_banner = 3;
        }, 300);
    }

    if (cont_banner == 0) {
        marker_1.classList.remove("marker_active");
        marker_3.classList.add("marker_active");
    }
    if (cont_banner == 3) {
        marker_2.classList.remove("marker_active");
        marker_3.classList.add("marker_active");
    }
    if (cont_banner == 2) {
        marker_3.classList.remove("marker_active");
        marker_2.classList.add("marker_active");
    }
    if (cont_banner == 1) {
        marker_2.classList.remove("marker_active");
        marker_1.classList.add("marker_active");
    }

    hero_btn.classList.add("hero_btn_active");

    setTimeout(() => {
        hero_btn.classList.remove("hero_btn_active");
        btn_click = false;
    }, 500);
})

setInterval(() => {
    if (!btn_click) {
        carrossel_container.style.transition = "0.3s";
        carrossel_container.style.transform += `translate(${translate_next}vw)`
        translate_next = -100;
        cont_banner += 1;
        translate_back = 100;

        if (cont_banner == 4) {
            setTimeout(() => {
                carrossel_container.style.transition = "0s";
                carrossel_container.style.transform = `translateX(-100vw)`
                cont_banner = 1;
                translate_next = -100;
            }, 300);
        }

        if (cont_banner == 2) {
            marker_1.classList.remove("marker_active");
            marker_2.classList.add("marker_active");
        }
        if (cont_banner == 3) {
            marker_2.classList.remove("marker_active");
            marker_3.classList.add("marker_active");
        }
        if (cont_banner == 1 || cont_banner == 4) {
            marker_3.classList.remove("marker_active");
            marker_1.classList.add("marker_active");
        }
    }
}, 10000);