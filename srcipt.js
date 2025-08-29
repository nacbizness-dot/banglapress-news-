/**
 * BanglaPress News Theme JS
 */

// Mobile Menu Toggle
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.createElement("button");
    menuToggle.innerText = "☰ Menu";
    menuToggle.classList.add("menu-toggle");

    const nav = document.querySelector(".main-navigation ul");
    if (nav && nav.parentNode) {
        nav.parentNode.insertBefore(menuToggle, nav);

        menuToggle.addEventListener("click", function () {
            nav.classList.toggle("active");
        });
    }
});
