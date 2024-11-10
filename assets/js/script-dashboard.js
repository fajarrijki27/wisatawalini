function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("content");
    sidebar.classList.toggle("active");

    if (sidebar.classList.contains("active")) {
        content.style.width = "100%";
    } else {
        content.style.width = "calc(100% - 250px)";
    }
}
