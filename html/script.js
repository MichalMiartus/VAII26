const menuButton = document.querySelector(".mobile-menu-toggle");
const sidebar = document.querySelector("aside");

menuButton.addEventListener("click", function() {
    const isOpen = sidebar.classList.toggle("open");

    menuButton.setAttribute("aria-expanded", String(isOpen));
});

document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && sidebar.classList.contains("open")) {
        sidebar.classList.remove("open");
        menuButton.setAttribute("aria-expanded", "false");
        menuButton.focus();
    }
});
