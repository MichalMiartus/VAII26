const menuButton = document.querySelector(".mobile-menu-toggle");
const sidebar = document.querySelector("aside");

function closeMenu() {
    sidebar.classList.remove("open");
    menuButton.setAttribute("aria-expanded", "false");
    menuButton.setAttribute("aria-label", "Otvoriť navigáciu");
}

document.addEventListener("click", event => {
    if (sidebar.classList.contains("open") && !sidebar.contains(event.target) && !menuButton.contains(event.target)) {
        closeMenu();
    }
});

menuButton.addEventListener("click", () => {
    const isOpen = sidebar.classList.toggle("open");
    menuButton.setAttribute("aria-expanded", String(isOpen));
    menuButton.setAttribute(
        "aria-label", !isOpen ? "Otvoriť navigáciu" : "Zatvoriť navigáciu");
});

document.addEventListener("keydown", event => {
    if (event.key === "Escape" && sidebar.classList.contains("open")) {
        closeMenu();
        menuButton.focus();
    }
});