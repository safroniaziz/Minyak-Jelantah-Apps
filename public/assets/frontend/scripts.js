AOS.init();



// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.padding = "10px 25px";
        document.getElementById("navbar").classList.add("nav-scroll");
        document.getElementById("navbar").classList.add("shadow-lg");
        document.getElementById("list-menu").classList.add("list-menu-scroll");
    } else {
        document.getElementById("navbar").style.padding = "15px 25px";
        document.getElementById("navbar").classList.remove("nav-scroll");
        document.getElementById("navbar").classList.remove("shadow-lg");
        document.getElementById("list-menu").classList.remove("list-menu-scroll");
    }
}
