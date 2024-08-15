window.onload = function() {
    var navbar = document.getElementById("navbar");
    if (navbar) {
        var sticky = navbar.offsetTop;

        window.onscroll = function() {
            if (window.scrollY >= sticky) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        };
    }
};

