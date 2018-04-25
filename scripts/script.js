"use strict";

window.addEventListener("load", function () {
    var navegacion = document.getElementById("navegacion"),
        open = document.getElementById("btn-menu"),
        menu = document.getElementById("menu");
    if (window.pageYOffset > 100) navegacion.classList.add("mouse");
    window.addEventListener("scroll", function () {
        window.pageYOffset > 100 && window.innerWidth > 900 ? navegacion.classList.add("mouse") : navegacion.classList.remove("mouse");
    });
    open.addEventListener("click", function () {
        menu.classList.toggle("menu-activo");
    });
});