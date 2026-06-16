document.addEventListener("DOMContentLoaded", function () {
    const nav = document.getElementById("main-nav");
    const welcomeSection = document.getElementById("welcome");

    const handleScroll = () => {
        if (window.scrollY >= welcomeSection.offsetTop - 100) {
            nav.classList.add("navbar-scrolled");
        } else {
            nav.classList.remove("navbar-scrolled");
        }
    };

    window.addEventListener("scroll", handleScroll);
    handleScroll();
});
