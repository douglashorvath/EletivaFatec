let listras = document.querySelector("#listras");
let menu = document.querySelector("#menu");
let itens = document.querySelectorAll(".item");

function abrirMenu(){
    if (menu.classList.contains("active"))/* se o item tem a classe "active"*/{
        menu.classList.remove("active");
        listras.querySelector("a").innerHTML = "<i class= 'fas fa-bars'></i>";
    }  else{
        menu.classList.add("active");
        listras.querySelector("a").innerHtml = "<i class = ' fa fa-times'></i>";
    
    }  
}

listras.addEventListener("click", abrirMenu);

function abrirSubMenu(){
    if (this.classList.contains("submenu-active")){
        this.classList.remove("submenu-active");
    } else if(menu.querySelector(".submenu-active")){
        menu.querySelector(".submenu-active").classList.remove("submenu-active");
        this.classList.add("submenu-active");
    }
    
    else{
        this.classList.add("submenu-active");
    }
}

for (let item of itens){
    if (item.querySelector(".submenu")){
        item.addEventListener("click", abrirSubMenu);

    }
}   