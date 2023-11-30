document.getElementById("toggleSidebar").addEventListener("click", function () {
    var sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("-translate-x-full"); // Toggle kelas '-translate-x-full' untuk menyembunyikan/menampilkan sidebar
});

window.addEventListener("scroll", function () {
    var nav = document.querySelector(".navi"); // Ganti dengan kelas sesuai kebutuhan
    var scrollPosition = window.scrollY;

    if (scrollPosition > 0) {
        nav.classList.remove("bg-[hsla(0,0%,100%,1)]");
        nav.classList.add("bg-[hsla(0,0%,100%,0.6)]");
    } else {
        nav.classList.remove("bg-[hsla(0,0%,100%,0.6)]");
        nav.classList.add("bg-[hsla(0,0%,100%,1)]");
    }
});
function hideAlert() {
    document.getElementById("success-alert").style.display = "none";
}
