document.addEventListener("DOMContentLoaded", function () {
    const nav = document.getElementById("main-nav");
    // Get the first section in the main container, or any section
    const firstSection = document.querySelector("main > section") || document.querySelector("section");

    const handleScroll = () => {
        if (!nav) return;

        if (!firstSection) {
            // Default behavior if no section is found on the page
            if (window.scrollY > 50) {
                nav.classList.add("navbar-scrolled");
            } else {
                nav.classList.remove("navbar-scrolled");
            }
            return;
        }

        // Calculate when the scroll reaches the end of the first section (e.g., hero/header)
        // Subtract 80px to transition slightly before it completely leaves the section
        const threshold = firstSection.offsetTop + firstSection.offsetHeight - 80;

        if (window.scrollY >= threshold) {
            nav.classList.add("navbar-scrolled");
        } else {
            nav.classList.remove("navbar-scrolled");
        }
    };

    window.addEventListener("scroll", handleScroll);
    handleScroll();
});
